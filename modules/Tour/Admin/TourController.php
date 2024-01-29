<?php
namespace Modules\Tour\Admin;

use Modules\Tour\Hook;
use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Tour\Models\Tour;
use Modules\Tour\Models\TourTerm;
use Illuminate\Support\Facades\DB;
use Modules\Core\Models\Attributes;
use Illuminate\Support\Facades\Auth;
use Modules\Location\Models\Location;
use Modules\Tour\Models\TourCategory;
use Modules\Tour\Models\TourTranslation;
use Modules\Core\Events\UpdatedServiceEvent;
use Modules\Core\Events\CreatedServicesEvent;
use Modules\Location\Models\LocationCategory;

class TourController extends AdminController
{
    protected $tourClass;
    protected $tourTranslationClass;
    protected $tourCategoryClass;
    protected $tourTermClass;
    protected $attributesClass;
    protected $locationClass;
    /**
     * @var string
     */
    private $locationCategoryClass;

    public function __construct()
    {
        $this->setActiveMenu(route('tour.admin.index'));
        $this->tourClass = Tour::class;
        $this->tourTranslationClass = TourTranslation::class;
        $this->tourCategoryClass = TourCategory::class;
        $this->tourTermClass = TourTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
        $this->locationCategoryClass = LocationCategory::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('tour_view');
        $query = $this->tourClass::query();
        $query->orderBy('id', 'desc');
        if (!empty($tour_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $tour_name . '%');
            $query->orderBy('title', 'asc');
        }
        if (!empty($cate = $request->input('cate_id'))) {
            $query->where('category_id', $cate);
        }
        if (!empty($is_featured = $request->input('is_featured'))) {
            $query->where('is_featured', 1);
        }
        if (!empty($location_id = $request->query('location_id'))) {
            $query->where('location_id', $location_id);
        }
        if ($this->hasPermission('tour_manage_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('author_id', $author);
            }
        } else {
            $query->where('author_id', Auth::id());
        }
        $data = [
            'rows'               => $query->with([
                'author',
                'category_tour'
            ])->paginate(20),
            'tour_categories'    => $this->tourCategoryClass::where('status', 'publish')->get()->toTree(),
            'tour_manage_others' => $this->hasPermission('tour_manage_others'),
            'page_title'         => __("Tour Management"),
            'breadcrumbs'        => [
                [
                    'name' => __('Tours'),
                    'url'  => route('tour.admin.index')
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.index', $data);
    }

    public function recovery(Request $request)
    {
        $this->checkPermission('tour_view');
        $query = $this->tourClass::onlyTrashed();
        $query->orderBy('id', 'desc');
        if (!empty($tour_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $tour_name . '%');
            $query->orderBy('title', 'asc');
        }
        if (!empty($cate = $request->input('cate_id'))) {
            $query->where('category_id', $cate);
        }
        if ($this->hasPermission('tour_manage_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('author_id', $author);
            }
        } else {
            $query->where('author_id', Auth::id());
        }
        $data = [
            'rows'               => $query->with([
                'author',
                'category_tour'
            ])->paginate(20),
            'tour_categories'    => $this->tourCategoryClass::where('status', 'publish')->get()->toTree(),
            'tour_manage_others' => $this->hasPermission('tour_manage_others'),
            'page_title'         => __("Recovery Tour Management"),
            'recovery'           => 1,
            'breadcrumbs'        => [
                [
                    'name' => __('Tours'),
                    'url'  => route('tour.admin.index')
                ],
                [
                    'name'  => __('Recovery'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('tour_create');
        $row = new Tour();
        $row->fill([
            'status' => 'publish'
        ]);

        $tour_menus=[
            ["id"=>"nav-overview","title"=>"Overview","icon"=>"fa fa-list-alt","active"=>"1","order"=>"1"],
            ["id"=>"nav-included-excluded","title"=>"Included/Excluded","icon"=>"fa fa-gift","active"=>"1","order"=>"2"],
            ["id"=>"nav-faqs","title"=>"Faq's","icon"=>"fa fa-info-circle","active"=>"1","order"=>"3"],
            ["id"=>"nav-tour-booking-form","title"=>"Booking","icon"=>"fa fa-ticket","active"=>"1","order"=>"4"],
            ["id"=>"nav-slider","title"=>"Slider","icon"=>"","active"=>"0","order"=>"5"],
            ["id"=>"nav-good-to-know","title"=>"Good to know","icon"=>"","active"=>"0","order"=>"6"],
            ["id"=>"nav-tour-feature","title"=>"Feature","icon"=>"","active"=>"0","order"=>"7"],
            ["id"=>"nav-tour-itinerary","title"=>"Itinerary","icon"=>"","active"=>"0","order"=>"8"],
            ["id"=>"nav-tour-banner","title"=>"Banner","icon"=>"","active"=>"0","order"=>"9"],
            ["id"=>"nav-tour-brochure","title"=>"Brochure","icon"=>"","active"=>"0","order"=>"10"],
            ["id"=>"nav-tour-video","title"=>"Video","icon"=>"","active"=>"0","order"=>"11"],
            ["id"=>"nav-review","title"=>"Review","icon"=>"","active"=>"0","order"=>"12"],
            ["id"=>"nav-tour-link","title"=>"Tags","icon"=>"","active"=>"0","order"=>"13"],
            ["id"=>"nav-tour-message","title"=>"Message","icon"=>"","active"=>"0","order"=>"14"]
        ];

        $data = [
            'row'               => $row,
            'attributes'        => $this->attributesClass::where('service', 'tour')->get(),
            'tour_category'     => $this->tourCategoryClass::where('status', 'publish')->get()->toTree(),
            'tour_location'     => $this->locationClass::where('status', 'publish')->get()->toTree(),
            'location_category' => $this->locationCategoryClass::where("status", "publish")->get(),
            'translation'       => new $this->tourTranslationClass(),
            'breadcrumbs'       => [
                [
                    'name' => __('Tours'),
                    'url'  => route('tour.admin.index')
                ],
                [
                    'name'  => __('Add Tour'),
                    'class' => 'active'
                ],
            ],
            'tour_menus'=>$tour_menus
        ];
        return view('Tour::admin.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('tour_update');
        $row = $this->tourClass::find($id);
        if (empty($row)) {
            return redirect(route('tour.admin.index'));
        }
        $translation = $row->translate($request->query('lang',get_main_lang()));
        if (!$this->hasPermission('tour_manage_others')) {
            if ($row->author_id != Auth::id()) {
                return redirect(route('tour.admin.index'));
            }
        }

        $tour_menus=[
            "nav-overview"=>["id"=>"","title"=>"Overview","icon"=>"fa fa-list-alt","active"=>"1","order"=>"1"],
            "nav-included-excluded"=>["id"=>"","title"=>"Included/Excluded","icon"=>"fa fa-gift","active"=>"1","order"=>"2"],
            "nav-faqs"=>["id"=>"","title"=>"Faq's","icon"=>"fa fa-info-circle","active"=>"1","order"=>"3"],
            "nav-tour-booking-form"=>["id"=>"","title"=>"Booking","icon"=>"fa fa-ticket","active"=>"1","order"=>"4"],
            "nav-slider"=>["id"=>"","title"=>"Slider","icon"=>"","active"=>"0","order"=>"5"],
            "nav-good-to-know"=>["id"=>"","title"=>"Good to know","icon"=>"","active"=>"0","order"=>"6"],
            "nav-tour-feature"=>["id"=>"","title"=>"Feature","icon"=>"","active"=>"0","order"=>"7"],
            "nav-tour-itinerary"=>["id"=>"","title"=>"Itinerary","icon"=>"","active"=>"0","order"=>"8"],
            "nav-tour-banner"=>["id"=>"","title"=>"Banner","icon"=>"","active"=>"0","order"=>"9"],
            "nav-tour-brochure"=>["id"=>"","title"=>"Brochure","icon"=>"","active"=>"0","order"=>"10"],
            "nav-tour-video"=>["id"=>"","title"=>"Video","icon"=>"","active"=>"0","order"=>"11"],
            "nav-review"=>["id"=>"","title"=>"Review","icon"=>"","active"=>"0","order"=>"12"],
            "nav-tour-link"=>["id"=>"","title"=>"Tags","icon"=>"","active"=>"0","order"=>"13"],
            "nav-tour-message"=>["id"=>"","title"=>"Message","icon"=>"","active"=>"0","order"=>"14"]
        ];
        // echo '<pre>'; print_r($tour_menus);exit;
        $tour_merge_menus=$row->meta->tour_mobile_menus;
        // echo '<pre>'; print_r($tour_merge_menus);exit;

        if(is_array($tour_merge_menus)==true && count((array)$tour_merge_menus)){
            $tour_mobile_menus=array_column($tour_merge_menus,"id");
            foreach($tour_menus as $menu)
            {
                if(!in_array($menu["id"],$tour_mobile_menus)){
                    $tour_merge_menus[$menu["id"]]=$menu;
                }
            }
            $order = array();
            foreach ($tour_merge_menus as $key => $menu)
            {
                $order[$key] = $menu['order'];
            }
            array_multisort($order, SORT_ASC, $tour_merge_menus);
        }else{
            $tour_merge_menus=$tour_menus;
        }
        $tour_merge_menus=($tour_merge_menus);
        // echo '<pre>'; print_r($tour_merge_menus);exit;


        $data = [
            'row'               => $row,
            'translation'       => $translation,
            "selected_terms"    => $row->tour_term->pluck('term_id'),
            'attributes'        => $this->attributesClass::where('service', 'tour')->get(),
            'tour_category'     => $this->tourCategoryClass::where('status', 'publish')->get()->toTree(),
            'tour_location'     => $this->locationClass::where('status', 'publish')->get()->toTree(),
            'location_category' => $this->locationCategoryClass::where("status", "publish")->get(),
            'enable_multi_lang' => true,
            'breadcrumbs'       => [
                [
                    'name' => __('Tours'),
                    'url'  => route('tour.admin.index')
                ],
                [
                    'name'  => __('Edit Tour'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__('Edit Tour'),
            'meta'=>$row->meta,
            'tour_menus'=>$tour_merge_menus
        ];

        // echo '<pre>'; print_r($tour_merge_menus);exit;
        return view('Tour::admin.detail', $data);
    }

    public function store(Request $request, $id)
    {

        if ($id > 0) {
            $this->checkPermission('tour_update');
            $row = $this->tourClass::find($id);
            if (empty($row)) {
                return redirect(route('tour.admin.index'));
            }
            if ($row->author_id != Auth::id() and !$this->hasPermission('tour_manage_others')) {
                return redirect(route('tour.admin.index'));
            }
        } else {
            $this->checkPermission('tour_create');
            $row = new $this->tourClass();
            $row->status = "publish";
        }
        if(!empty($request->input('enable_fixed_date'))){
            $rules = [
                'start_date'        =>'required|date',
                'end_date'         =>'required|date|after_or_equal:start_date',
                'last_booking_date' =>'required|date|before:start_date|after:'.now(),
            ];
            $request->validate($rules);
        }

        $row->fill($request->input());
        if ($request->input('slug')) {
            $row->slug = $request->input('slug');
        }
        $row->ical_import_url = $request->ical_import_url;
        $row->author_id = $request->input('author_id');
        $row->default_state = $request->input('default_state', 1);
        $row->enable_service_fee = $request->input('enable_service_fee');
        $row->service_fee = $request->input('service_fee');
        $res = $row->saveOriginOrTranslation($request->input('lang'), true);

        if ($res) {
            if (!$request->input('lang') or is_default_lang($request->input('lang'))) {
                $this->saveTerms($row, $request);
                $row->saveMeta($request);
            }

            do_action(Hook::AFTER_SAVING,$row,$request);

            if ($id > 0) {
                event(new UpdatedServiceEvent($row));
                return back()->with('success', __('Tour updated'));
            } else {
                event(new CreatedServicesEvent($row));
                return redirect(route('tour.admin.edit', $row->id))->with('success', __('Tour created'));
            }
        }
    }

    public function saveTerms($row, $request)
    {
        if (empty($request->input('terms'))) {
            $this->tourTermClass::where('tour_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->tourTermClass::firstOrCreate([
                    'term_id' => $term_id,
                    'tour_id' => $row->id
                ]);
            }
            $this->tourTermClass::where('tour_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
        }
    }

    public function bulkEdit(Request $request)
    {

        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        switch ($action) {
            case "delete":
                foreach ($ids as $id) {
                    $query = $this->tourClass::where("id", $id);
                    if (!$this->hasPermission('tour_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('tour_delete');
                    }
                    $row = $query->first();
                    if (!empty($row)) {
                        $row->delete();
                        event(new UpdatedServiceEvent($row));
                    }
                }
                return redirect()->back()->with('success', __('Deleted success!'));
                break;
            case "permanently_delete":
                foreach ($ids as $id) {
                    $query = $this->tourClass::where("id", $id);
                    if (!$this->hasPermission('tour_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('tour_delete');
                    }
                    $row = $query->withTrashed()->first();
                    if ($row) {
                        $row->forceDelete();
                    }
                }
                return redirect()->back()->with('success', __('Permanently delete success!'));
                break;
            case "recovery":
                foreach ($ids as $id) {
                    $query = $this->tourClass::withTrashed()->where("id", $id);
                    if (!$this->hasPermission('tour_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('tour_delete');
                    }
                    $row = $query->first();
                    if (!empty($row)) {
                        $row->restore();
                        event(new UpdatedServiceEvent($row));
                    }
                }
                return redirect()->back()->with('success', __('Recovery success!'));
                break;
            case "clone":
                $this->checkPermission('tour_create');
                foreach ($ids as $id) {
                    (new $this->tourClass())->saveCloneByID($id);
                }
                return redirect()->back()->with('success', __('Clone success!'));
                break;
            default:
                // Change status
                foreach ($ids as $id) {
                    $query = $this->tourClass::where("id", $id);
                    if (!$this->hasPermission('tour_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('tour_update');
                    }
                    $row = $query->first();
                    $row->status = $action;
                    $row->save();
                    event(new UpdatedServiceEvent($row));
                }
                return redirect()->back()->with('success', __('Update success!'));
                break;
        }
    }

    public function getForSelect2(Request $request)
    {
        $pre_selected = $request->query('pre_selected');
        $selected = $request->query('selected');
        if ($pre_selected && $selected) {
            if (is_array($selected)) {
                $items = $this->tourClass::select('id', DB::raw('concat("#",id," - ",title) as text'))->whereIn('id', $selected)->take(50)->get();

            } else {
                $items = $this->tourClass::find($selected);
            }

            return [
                'results'=>$items
            ];
        }
        $q = $request->query('q');
        $query = $this->tourClass::select('id', DB::raw('concat("#",id," - ",title) as text'))->where("status", "publish");
        if ($q) {
            $query->where('title', 'like', '%' . $q . '%');
        }
        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return $this->sendSuccess([
            'results' => $res
        ]);
    }
}
