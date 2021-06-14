<?php
namespace App\Components;
use App\Menu;
class MenuRecusive{
    private $html = '';
    public function __construct()
    {
        $this->html ='';
    }
    public function MenuRecusiveAdd($parent_id = 0, $subMark = ''){
        $data = Menu::where('parent_id', $parent_id)->get();
        foreach($data as $dataItem){
            $this->html .= '<option value="' . $dataItem->id . '"> '. $subMark . $dataItem->name . '</option>';
            $this->MenuRecusiveAdd($dataItem->id, $subMark.'--');
        }
        return $this->html;
    }
    public function MenuRecusiveEdit($parentIdMenuEdit, $parent_id = 0, $subMark = ''){
        $data = Menu::where('parent_id', $parent_id)->get();
        foreach($data as $dataItem){
            if($parentIdMenuEdit == $dataItem->id){
                $this->html .= '<option selected value="' . $dataItem->id . '"> '. $subMark . $dataItem->name . '</option>';
            }
            else{
                $this->html .= '<option value="' . $dataItem->id . '"> '. $subMark . $dataItem->name . '</option>';
            }
            $this->MenuRecusiveEdit($parentIdMenuEdit, $dataItem->id, $subMark.'--');
        }
        return $this->html;
    }
}