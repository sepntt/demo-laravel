<?php

namespace App\Repository\Backend;

use App\Repository\RepositoryAbstract;

class MenusRepository extends RepositoryAbstract implements MenusInterface
{

    public $model = '\App\Models\Menus';
    
    /**
     * Format data to tree like array.
     *
     * @return array
     */
    public function toTree()
    {
        return $this->buildNestedArray();
    }

    /**
     * Build Nested array.
     *
     * @param array $nodes
     * @param int   $parentId
     *
     * @return array
     */
    protected function buildNestedArray(array $nodes = [], $parentId = 0)
    {
        $branch = [];

        if (empty($nodes)) {
            $nodes = $this->allNodes();
        }

        foreach ($nodes as $node) {
            if ($node['parent_id'] == $parentId) {
                $children = $this->buildNestedArray($nodes, $node['id']);

                if ($children) {
                    $node['children'] = $children;
                }

                $branch[] = $node;
            }
        }

        return $branch;
    }

    /**
     * @return array
     */
    public function allNodes() : array
    {
        $model = new $this->model;
        $all = $model->orderBy('order')->with('roles')->get()->toArray();
        return $all;
    }



}
