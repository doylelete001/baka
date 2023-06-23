<?php interface Dao{
    //data = dados em ingles
    public function create($data);
    public function read();
    public function update($id,$data);
    public function delete($id);
}