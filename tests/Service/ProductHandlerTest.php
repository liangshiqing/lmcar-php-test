<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    public function testGetTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        $this->assertEquals(143, $totalPrice);
    }

    /**
     * 计算商品总金额
     */
    public function testGetPriceTotal()
    {
        $priceArr = array_column($this->products, 'price');
        $totalPrice = array_sum($priceArr);
        echo '计算商品总金额结果:'.$totalPrice.PHP_EOL;
    }

    /**
     * 商品数组排序且过滤出指定key的商品
     *
     * @param string $filter
     * @param string $sort
     */
    public function testFilterSortData($filter = 'Dessert',$sort = 'DESC')
    {
        //商品按照金额大小排序
        $data = $this->products;
        $newArr = array_column($data,'price');
        $order = $sort =='DESC' ? SORT_DESC : SORT_ASC;
        array_multisort($newArr,$order,$data);

        //过滤指定商品种类
        foreach ($data as $key => $value) {
            if ($value['type'] != $filter){
                unset($data[$key]);
            }
        }
        echo '数组排序且过滤结果:'.PHP_EOL;
        print_r($data);
    }

    /**
     * 日期转时间戳
     */
    public function testDateToStrTime()
    {
        //日期转时间戳
        $data = $this->products;
        foreach ($data as $key => $value) {
            $data[$key]['create_at'] = strtotime($value['create_at']);
        }
        echo '数组时间转时间戳结果:'.PHP_EOL;
        print_r($data);
    }


}