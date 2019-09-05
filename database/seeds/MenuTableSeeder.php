<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{

    public function insertMenuItem($item, $parentID) {
        
        $returnArr = [];

        $menuItemID = DB::table('menu_items')->insertGetId([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'title' => $item['title'],
            'url' => $item['url'],
            'target' => $item['target'],
            'icon_class' => $item['icon_class'],
            'extra_class' => $item['extra_class'],
            'route' => $item['route'],
            'parameters' => $item['parameters']
        ]);

        $returnArr[$menuItemID] = ['menu_item_id' => $menuItemID, 'parentID' => $parentID];

        if (count($item['children'])) {
            
            foreach ($item['children'] as $child) {
                $child_array = $this->insertMenuItem($child, $menuItemID);
                $returnArr = array_merge($returnArr, $child_array);
            }

        }

        return $returnArr;
    }

    public function associateMenuItemsToMenuAndParent($menu_id, $menu_item_id, $menu_item_parent_id = 0, $menu_order = 0) {

        $order = $menu_order;
        $returnArr = [];

        foreach ($menu_item_id as $menu_item) {

            if (is_array($menu_item) && !isset($menu_item['children'])) { // That type detection could be much better...

                //Check to see if order has started
                $dbCheck = DB::table('menu_menu_item')->where(['menu_id' => $menu_id, 'parent_id' => $menu_item['parentID'], 'order' => 0])->exists();

                if (!$dbCheck) {
                    $order = 0;
                }

                $menuItemAssociationID = DB::table('menu_menu_item')->insertGetId([
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'menu_id' => $menu_id,
                    'menu_item_id' => $menu_item['menu_item_id'],
                    'parent_id' => $menu_item['parentID'],
                    'order' => $order
                ]);

            }
            
            $order++;
        }

    }

    public function fetchDefaultSeededMenus() {
        return $menus = [
            [
                'name' => 'Default Panel Sidebar',
                'menu_position' => 'panel_sidebar',
                'menu_items' => [
                    [
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'title' => 'Dashboard',
                        'url' => NULL,
                        'target' => '_self',
                        'icon_class' => 'fa fa-dashboard',
                        'extra_class' => '',
                        'route' => 'panel.get.dashboard',
                        'parameters' => '',
                        'children' => []
                    ],
                    [
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'title' => 'System',
                        'url' => NULL,
                        'target' => '_self',
                        'icon_class' => 'fa fa-microchip',
                        'extra_class' => '',
                        'route' => NULL,
                        'parameters' => '',
                        'children' => [
                            [
                                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'title' => 'Menus',
                                'url' => NULL,
                                'target' => '_self',
                                'icon_class' => 'fas fa-bars',
                                'extra_class' => '',
                                'route' => 'system.get.show-menus',
                                'parameters' => '',
                                'children' => []
                            ],
                            [
                                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'title' => 'Permissions',
                                'url' => NULL,
                                'target' => '_self',
                                'icon_class' => 'fas fa-project-diagram',
                                'extra_class' => '',
                                'route' => 'system.get.show-permissions',
                                'parameters' => '',
                                'children' => []
                            ],
                            [
                                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'title' => 'Realms',
                                'url' => NULL,
                                'target' => '_self',
                                'icon_class' => 'fas fa-tree',
                                'extra_class' => '',
                                'route' => 'system.get.show-realms',
                                'parameters' => '',
                                'children' => []
                            ],
                            [
                                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'title' => 'Roles',
                                'url' => NULL,
                                'target' => '_self',
                                'icon_class' => 'fab fa-superpowers',
                                'extra_class' => '',
                                'route' => 'system.get.show-roles',
                                'parameters' => '',
                                'children' => []
                            ],
                            [
                                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'title' => 'Settings',
                                'url' => NULL,
                                'target' => '_self',
                                'icon_class' => 'fas fa-sliders-h',
                                'extra_class' => '',
                                'route' => 'system.get.show-settings',
                                'parameters' => '',
                                'children' => []
                            ],
                            [
                                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'title' => 'Users',
                                'url' => NULL,
                                'target' => '_self',
                                'icon_class' => 'fas fa-users',
                                'extra_class' => '',
                                'route' => 'system.get.show-users',
                                'parameters' => '',
                                'children' => []
                            ],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Default Panel Footer',
                'menu_position' => 'panel_footer',
                'menu_items' => [
                    [
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'title' => 'GitHub',
                        'url' => 'https://github.com/kenmoini/ixion',
                        'target' => '_self',
                        'icon_class' => 'fab fa-github',
                        'extra_class' => '',
                        'route' => NULL,
                        'parameters' => '',
                        'children' => []
                    ],
                ]
            ],
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->fetchDefaultSeededMenus() as $menu) {
            $menuID = DB::table('menus')->insertGetId([
                'name' => $menu['name'],
                'slug' => Str::slug($menu['name']),
                'menu_position' => $menu['menu_position'],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);

            $menuItemIDs = [];
            
            foreach ($menu['menu_items'] as $item) {
                
                //Create Menu Item in DB
                $menuItemIDs[] = $this->insertMenuItem($item, 0);

            }

            foreach ($menuItemIDs as $initialOrder => $menu_item_id) {
                //Associate Menu Item to Menu and Parent
                $this->associateMenuItemsToMenuAndParent($menuID, $menu_item_id, 0, $initialOrder);
            }
        }
    }
}
