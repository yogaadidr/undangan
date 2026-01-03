<?php

namespace App\Http\Controllers;

class CrudController extends Controller
{
    protected $model;
    protected $name;

    public function __construct($model, $name = null)
    {
        $this->model = $model;
        $this->name = $name ?? class_basename($model);
    }

    public function delete($id)
    {
        $result = $this->deleteData($id);
        return back()->with('success', $result['message']);
    }

    protected function storeData($data)
    {
        $message = "{$this->name} has been added!";
        $this->model::create($data);
        return [
            'success' => true,
            'message' => $message
        ];
    }

    protected function updateData($data, $id)
    {
        $message = "{$this->name} has been updated!";
        $this->model::where('id', $id)->update($data);
        return [
            'success' => true,
            'message' => $message
        ];
    }

    protected function deleteData($id)
    {
        $message = "{$this->name} has been deleted!";
        $query = $this->model::findOrFail($id);
        $query->delete();
        return [
            'success' => true,
            'message' => $message
        ];
    }
}
