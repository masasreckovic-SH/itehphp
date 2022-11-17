<?php

class Company
{
    public $id;
    public $name;
    public $industry;
    public $headquarters;
    public $founder;
    public $founded;
    public $employees;
    public $img;

    public function __construct(
        $id,
        $name,
        $industry,
        $headquarters,
        $founder,
        $founded,
        $employees,
        $img
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->industry = $industry;
        $this->headquarters = $headquarters;
        $this->founder = $founder;
        $this->founded = $founded;
        $this->employees = $employees;
        $this->img = $img;
    }
}

function returnCompanyName($companyid)
{
    switch ($companyid) {
        case 1:
            return 'Microsoft';
            break;
        case 2:
            return 'Meta';
            break;
        case 3:
            return 'Google';
            break;
        case 4:
            return 'British Petroleum';
            break;
        case 5:
            return 'McDonalds';
            break;
        case 6:
            return 'Coca-Cola';
            break;
    }
}

function returnCompanyId($company)
{
    switch ($company) {
        case 'Microsoft':
            return 1;
            break;
        case 'Meta':
            return 2;
            break;
        case 'Google':
            return 3;
            break;
        case 'BP':
            return 4;
            break;
        case 'McDonalds':
            return 5;
            break;
        case 'Coca-Cola':
            return 6;
            break;
    }
}
