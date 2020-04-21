<?php
/**
 * Created by PhpStorm.
 * User: Brutus1
 * Date: 20.04.2020
 * Time: 20:40
 */
namespace App\Repositories;

interface RepositoryInterface {
    public function getAll($columns = array('*'));
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
}
