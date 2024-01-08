<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait FilterTrait
{
    // Instruction
    // For using this in component
    // add to component
    //
    //
    // --------------------------------------
    // private $filterSaveData = [
    //     'perPage' => 'companies_list-perPage',
    //     'sortBy' => 'companies_list-sortBy',
    //      ...
    // ];
    // --------------------------------------


    private $componentQueries = [];


    public function saveFiltersInSession(){
        foreach ($this->filterSaveData as $querryVal => $sessionVal) {
            // Put querry val in session
            // perPage => 50
            Session::put($sessionVal, $this->$querryVal);
        }
    }

    public function loadFiltersFromSession(){
        foreach ($this->filterSaveData as $querryVal => $sessionVal) {
            // Read val from session
            $value = Session::get($sessionVal);

            // If exist update filter param
            if($value){$this->$querryVal = $value;}
        }
    }

    public function mountFilterTrait()
    {
        $this->loadFiltersFromSession();
    }

    public function renderingFilterTrait()
    {
       $this->saveFiltersInSession();
    }


    // Part for tests, try add dynamic gerate value param
    // --------------------------------------
    // public function filterSaveForFile(string $fileName, $queryString){
    //     if($fileName){$this->fileName = $fileName;}
    //     if($queryString){$this->componentQueries = $queryString;}

    //     $this->setFilterParams();
    // }

    // public function setFilterParams(){
    //     // For all Query params -> perPage...
    //     foreach($this->componentQueries as $param => $key){
    //         // Param name -> companies_list-perPage
    //         $paramName = $this->fileName . '-' . $param;
    //         // add to array ['perPage' => 'companies_list-perPage' ]
    //         $this->filterSaveData[$param] = $paramName;
    //     }
    //     // array look like this
    //     // $filterSaveData = [
    //     //     'perPage' => 'companies_list-perPage',
    //     //     'sortBy' => 'companies_list-sortBy',
    //     //     'companyName' => 'companies_list-companyName',
    //     // ];
    // }
}
