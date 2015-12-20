<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 07/06/2015
 * Time: 11:37
 */

class AdminVehiclesController extends BaseAdminLpunktController {

    public function addTypeAction() {
        $tab = $this->getParametersMap();
        if(isset($tab["submit"])) {
            $category = new VehicleType();
            $category->setTypeName($tab["name"]);
            $category->update();
            $this->forward("admin/vehicles/showType");
        }
    }

    public function editTypeAction() {
        $tab = $this->getParametersMap();
        if(isset($tab['id'])){
            if(isset($tab["submit"])) {
                $category = new VehicleType($tab["id"]);
                $category->setTypeName($tab["name"]);
                $category->update();
                $this->forward("admin/category/show", "msg=Typ pojazdu został zaktualizowany");
            }
            $vehicleType = new VehicleType($tab["id"]);
            $this->_view->_vehicleType = $vehicleType;
        }
    }

    public function removeTypeAction() {
        $tab = $this->getParametersMap();
        if(isset($tab["id"])) {
            $table = new Table("vehicle_types");
            $table->delete("id = ".$tab["id"]);
            $this->forward("admin/vehicles/showType", "msg=Typ pojazdu został usunięty");
        }
    }

    public function showTypeAction() {
        $vehicle_type = new Table("vehicle_types");
        $this->_view->_vehicle_types = $vehicle_type->fetchAll();
    }

} 