<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 05/06/2015
 * Time: 20:12
 */

class AdminCategoryController extends BaseAdminLpunktController {

    public function initAll() {
        parent::initAll();
        $table = new Table("vehicle_types");
        $vehicles = $table->fetchAll();
        $items = array();
        while($vehicles->next()) {
            $row = $vehicles->current();
            array_push($items, new OptionItem($row["type_name"], $row["id"]));
        }
        $this->_view->_select = new SimpleSelect("vehicle_type", $items);
    }
    public function addAction() {
        $tab = $this->getParametersMap();
        if(isset($tab["submit"])) {
            $category = new Category();
            $category->setName($tab["name"]);
            $category->setVehicleType($tab["vehicle_type"]);
            $category->update();
            $this->forward("admin/category/show", "msg=Dodano nową kategorie");
        }
    }

    public function editAction() {
        $tab = $this->getParametersMap();
        if(isset($tab['id'])){
            if(isset($tab["submit"])) {
                $category = new Category($tab["id"]);
                $category->setName($tab["name"]);
                $category->setVehicleType($tab["vehicle_type"]);
                $category->update();
                $this->forward("admin/category/show", "msg=Kategoria została zaktualizowana");
            }
            $categories = new Table("categories");
            $categories->join("vehicle_types", "vehicle_types.id = vehicle_type");
            $this->_view->_category = $categories->find("categories.id = " . $tab['id']);
        }
    }

    public function removeAction() {
        $tab = $this->getParametersMap();
        if(isset($tab["id"])) {
            $table = new Table("categories");
            $table->delete("id = ".$tab["id"]);
            $this->forward("admin/category/show", "msg=Kategoria została usunięta");
        }
    }

    public function showAction() {
        $categories = new Table("categories");
        $categories->join("vehicle_types", "vehicle_types.id = vehicle_type");
        $this->_view->_categories = $categories->select("categories.id, vehicle_type, name, type_name");

    }
} 