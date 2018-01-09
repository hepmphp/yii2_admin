<?php

namespace app\models;

use Yii;
use backend\services\helpers\Tree;

/**
 * This is the model class for table "{{%ga_admin_menu}}".
 *
 * @property integer $id
 * @property integer $parentid
 * @property string $model
 * @property string $action
 * @property string $data
 * @property integer $status
 * @property string $name
 * @property string $remark
 * @property integer $listorder
 * @property integer $level
 */
class GaAdminMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ga_admin_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid', 'status', 'listorder', 'level'], 'integer'],
            [['model', 'action', 'remark'], 'string', 'max' => 255],
            [['data', 'name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parentid' => Yii::t('app', '菜单上一级id'),
            'model' => Yii::t('app', '控制器'),
            'action' => Yii::t('app', '方法'),
            'data' => Yii::t('app', '业务数据'),
            'status' => Yii::t('app', '菜单状态 -1 隐藏  0正常'),
            'name' => Yii::t('app', '菜单名称'),
            'remark' => Yii::t('app', '备注'),
            'listorder' => Yii::t('app', '排序ID'),
            'level' => Yii::t('app', '菜单级别 0 1 2 3 4 依次递增'),
        ];
    }
    /***
     * 获取菜单状态
     * @return array
     */
    public function get_config_status(){
        return array(
            '-1'=>array('id'=>-1,'name'=>'隐藏'),
            '0'=>array('id'=>0,'name'=>'显示'),
        );
    }

    /**
     * 获取菜单数据
     * @param $where
     * @return array
     */
    public function getMenuData($where){
        $mAdminMenu = GaAdminMenu::find()->where($where)->asArray(true);
        $data = $mAdminMenu->limit(100000)->all();
        $menu_data = array();
        foreach($data as $k=>$v){
            $menu = array(
                'id'=>$v['id'],
                'pId'=>$v['parentid'],
                'name'=>$v['name'],
            );
            /*
            if($v['parentid']==0){
                $menu['open'] = true;
            }*/
            $menu_data[] = $menu;
        }
        return $menu_data;
    }

    /**
     * 获取菜单配置
     * @param null $parentid
     * @param null $app_id
     * @return mixed
     */
    public function get_config_menu($parentid=null,$app_id=null){
        $tree = new Tree();
        $admin_menu = GaAdminMenu::find()->asArray(true)->all();
        foreach ($admin_menu as $r) {
            if($parentid !=null){
                $r['selected'] = $r['id'] == $parentid ? 'selected' : '';
            }else{
                $r['selected'] = '';
            }

            $array[] = $r;
        }
        $str = "<option value='\$id' \$selected>\$spacer \$name</option>";
        $tree->init($array);
        $select_categorys = $tree->get_tree(0, $str);
        return $select_categorys;
    }
    /***
     *
     * 获取树形菜单
     * @param null $parentid
     * @return Tree
     */
    public function get_menu_tree($parentid=null){
        $tree = new Tree();
        $admin_menu = GaAdminMenu::find()->where(1)->asArray(true)->all();
        foreach ($admin_menu as $r) {
            if($parentid !=null){
                $r['selected'] = $r['id'] == $parentid ? 'selected' : '';
            }else{
                $r['selected'] = '';
            }

            $array[] = $r;
        }
        $tree->init($array);
        return $tree;
    }


}
