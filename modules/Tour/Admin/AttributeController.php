<?php
namespace Modules\Tour\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Core\Models\Attributes;
use Modules\Core\Models\AttributesTranslation;
use Modules\Core\Models\Terms;
use Modules\Core\Models\TermsTranslation;

class AttributeController extends AdminController
{
    protected $attributesClass;
    protected $termsClass;
    public function __construct()
    {
        $this->setActiveMenu(route('tour.admin.index'));
        $this->attributesClass = Attributes::class;
        $this->termsClass = Terms::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('tour_manage_attributes');
        $listAttr = $this->attributesClass::where("service", 'tour');
        if (!empty($search = $request->query('s'))) {
            $listAttr->where('name', 'LIKE', '%' . $search . '%');
        }
        $listAttr->orderBy('created_at', 'desc');
        $data = [
            'rows'        => $listAttr->get(),
            'row'         => new $this->attributesClass(),
            'translation'    => new AttributesTranslation(),
            'breadcrumbs' => [
                [
                    'name' => __('Tour'),
                    'url'  => route('tour.admin.index')
                ],
                [
                    'name'  => __('Attributes'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.attribute.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $row = $this->attributesClass::find($id);
        if (empty($row)) {
            return redirect()->back()->with('error', __('Attributes not found!'));
        }
        $translation = $row->translate($request->query('lang',get_main_lang()));
        $this->checkPermission('tour_manage_attributes');
        $data = [
            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'rows'        => $this->attributesClass::where("service", 'tour')->get(),
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => __('Tour'),
                    'url'  => route('tour.admin.index')
                ],
                [
                    'name' => __('Attributes'),
                    'url'  => route('tour.admin.attribute.index')
                ],
                [
                    'name'  => __('Attributes: :name', ['name' => $row->name]),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.attribute.detail', $data);
    }

    public function store(Request $request)
    {
        $this->checkPermission('tour_manage_attributes');
        $this->validate($request, [
            'name' => 'required'
        ]);
        $id = $request->input('id');
        if ($id) {
            $row = $this->attributesClass::find($id);
            if (empty($row)) {
                return redirect()->back()->with('error', __('Attributes not found!'));
            }
        } else {
            $row = new $this->attributesClass($request->input());
            $row->service = 'tour';
        }
        $row->fill($request->input());
        $res = $row->saveOriginOrTranslation($request->input('lang'));
        if ($res) {
            return redirect()->back()->with('success', __('Attribute saved'));
        }
    }

    public function editAttrBulk(Request $request)
    {
        $this->checkPermission('tour_manage_attributes');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('Select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Select an Action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = $this->attributesClass::where("id", $id);
                $query->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        }
        return redirect()->back()->with('success', __('Updated success!'));
    }

    public function terms(Request $request, $attr_id)
    {
        $this->checkPermission('tour_manage_attributes');
        $row = $this->attributesClass::find($attr_id);
        if (empty($row)) {
            return redirect()->back()->with('error', __('Term not found!'));
        }
        $listTerms = $this->termsClass::where("attr_id", $attr_id);
        if (!empty($search = $request->query('s'))) {
            $listTerms->where('name', 'LIKE', '%' . $search . '%');
        }
        $listTerms->orderBy('created_at', 'desc');
        $data = [
            'rows'        => $listTerms->paginate(20),
            'attr'        => $row,
            "row"         => new $this->termsClass(),
            'translation'    => new TermsTranslation(),
            'breadcrumbs' => [
                [
                    'name' => __('Tour'),
                    'url'  => route('tour.admin.index')
                ],
                [
                    'name' => __('Attributes'),
                    'url'  => route('tour.admin.attribute.index')
                ],
                [
                    'name'  => __('Attribute: :name', ['name' => $row->name]),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.terms.index', $data);
    }

    public function term_edit(Request $request, $id)
    {
        $this->checkPermission('tour_manage_attributes');
        $row = $this->termsClass::find($id);
        if (empty($row)) {
            return redirect()->back()->with('error', __('Term not found'));
        }
        $translation = $row->translate($request->query('lang',get_main_lang()));
        $attr = $this->attributesClass::find($row->attr_id);
        $data = [
            'row'         => $row,
            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'breadcrumbs' => [
                [
                    'name' => __('Tour'),
                    'url'  => route('tour.admin.index')
                ],
                [
                    'name' => __('Attributes'),
                    'url'  => route('tour.admin.attribute.index')
                ],
                [
                    'name' => $attr->name,
                    'url'  => route('tour.admin.attribute.term.index',['attr_id'=>$row->attr_id])
                ],
                [
                    'name'  => __('Term: :name', ['name' => $row->name]),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.terms.detail', $data);
    }

    public function term_store(Request $request)
    {
        $this->checkPermission('tour_manage_attributes');
        $this->validate($request, [
            'name' => 'required'
        ]);
        $id = $request->input('id');
        if ($id) {
            $row = $this->termsClass::find($id);
            if (empty($row)) {
                return redirect()->back()->with('error', __('Term not found!'));
            }
        } else {
            $row = new $this->termsClass($request->input());
            $row->attr_id = $request->input('attr_id');
        }
        $row->fill($request->input());
        $res = $row->saveOriginOrTranslation($request->input('lang'));
        if ($res) {
            return redirect()->back()->with('success', __('Term saved'));
        }
    }

    public function editTermBulk(Request $request)
    {
        $this->checkPermission('tour_manage_attributes');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('Select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Select an Action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = $this->termsClass::where("id", $id);
                $query->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        }
        return redirect()->back()->with('success', __('Updated success!'));
    }

    public function getForSelect2(Request $request){

        $pre_selected = $request->query('pre_selected');
        $selected = $request->query('selected');
        if($pre_selected && is_array($selected)){
            $q = $request->query('q');
            $query = $this->attributesClass::select('id', 'name as text')->where("service","tour");
            if ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            }
            $res = $query->with('terms:id,attr_id,name as text')->orderBy('name', 'asc')->get();
            $data=[];
            foreach($res as $term){
                $children=[];
                foreach($term->terms as $item){
                    if(in_array($item->id,$selected)){
                        $children[]=[
                            "id"=>$item->id,
                            "text"=>$item->text,
                            "selected"=>true,
                            "disabled"=>true
                        ];
                    }
                }
                if(count($children)){
                    $data[]=[
                        "id"=>$term->id,
                        "text"=>$term->text,
                        "children"=>$children
                    ];
                }
            }
            return response()->json([
                'items' => $data
            ]);
        }else{
            $q = $request->query('q');
            $query = $this->attributesClass::select('id', 'name as text')->where("service","tour");
            if ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            }
            $res = $query->with('terms:id,attr_id,name as text')->orderBy('name', 'asc')->get();
            $data=[];
            foreach($res as $term){
                $data[]=[
                    "id"=>$term->id,
                    "text"=>$term->text,
                    "children"=>$term->terms
                ];
            }
            return response()->json([
                'results' => $data
            ]);
        }

    }
}
