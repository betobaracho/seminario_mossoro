<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ZonalDAO
 *
 * @author betobaracho
 */
Interface ZonalDAO {

    public function load($id);

    /**
     * Get all records from table
     */
    public function queryAll();

    
}
