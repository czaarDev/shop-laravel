<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 34,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 35,
                'title' => 'admin_access',
            ],
            [
                'id'    => 36,
                'title' => 'state_create',
            ],
            [
                'id'    => 37,
                'title' => 'state_edit',
            ],
            [
                'id'    => 38,
                'title' => 'state_show',
            ],
            [
                'id'    => 39,
                'title' => 'state_delete',
            ],
            [
                'id'    => 40,
                'title' => 'state_access',
            ],
            [
                'id'    => 41,
                'title' => 'city_create',
            ],
            [
                'id'    => 42,
                'title' => 'city_edit',
            ],
            [
                'id'    => 43,
                'title' => 'city_show',
            ],
            [
                'id'    => 44,
                'title' => 'city_delete',
            ],
            [
                'id'    => 45,
                'title' => 'city_access',
            ],
            [
                'id'    => 46,
                'title' => 'stock_product_create',
            ],
            [
                'id'    => 47,
                'title' => 'stock_product_edit',
            ],
            [
                'id'    => 48,
                'title' => 'stock_product_show',
            ],
            [
                'id'    => 49,
                'title' => 'stock_product_delete',
            ],
            [
                'id'    => 50,
                'title' => 'stock_product_access',
            ],
            [
                'id'    => 51,
                'title' => 'pedido_access',
            ],
            [
                'id'    => 52,
                'title' => 'item_order_create',
            ],
            [
                'id'    => 53,
                'title' => 'item_order_edit',
            ],
            [
                'id'    => 54,
                'title' => 'item_order_show',
            ],
            [
                'id'    => 55,
                'title' => 'item_order_delete',
            ],
            [
                'id'    => 56,
                'title' => 'item_order_access',
            ],
            [
                'id'    => 57,
                'title' => 'order_create',
            ],
            [
                'id'    => 58,
                'title' => 'order_edit',
            ],
            [
                'id'    => 59,
                'title' => 'order_show',
            ],
            [
                'id'    => 60,
                'title' => 'order_delete',
            ],
            [
                'id'    => 61,
                'title' => 'order_access',
            ],
            [
                'id'    => 62,
                'title' => 'payment_order_create',
            ],
            [
                'id'    => 63,
                'title' => 'payment_order_edit',
            ],
            [
                'id'    => 64,
                'title' => 'payment_order_show',
            ],
            [
                'id'    => 65,
                'title' => 'payment_order_delete',
            ],
            [
                'id'    => 66,
                'title' => 'payment_order_access',
            ],
            [
                'id'    => 67,
                'title' => 'delivery_create',
            ],
            [
                'id'    => 68,
                'title' => 'delivery_edit',
            ],
            [
                'id'    => 69,
                'title' => 'delivery_show',
            ],
            [
                'id'    => 70,
                'title' => 'delivery_delete',
            ],
            [
                'id'    => 71,
                'title' => 'delivery_access',
            ],
            [
                'id'    => 72,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 73,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 74,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 75,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 76,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 77,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 83,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 84,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 85,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 86,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 87,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 88,
                'title' => 'setting_create',
            ],
            [
                'id'    => 89,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 90,
                'title' => 'setting_show',
            ],
            [
                'id'    => 91,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 92,
                'title' => 'setting_access',
            ],
            [
                'id'    => 93,
                'title' => 'banner_create',
            ],
            [
                'id'    => 94,
                'title' => 'banner_edit',
            ],
            [
                'id'    => 95,
                'title' => 'banner_show',
            ],
            [
                'id'    => 96,
                'title' => 'banner_delete',
            ],
            [
                'id'    => 97,
                'title' => 'banner_access',
            ],
            [
                'id'    => 98,
                'title' => 'post_create',
            ],
            [
                'id'    => 99,
                'title' => 'post_edit',
            ],
            [
                'id'    => 100,
                'title' => 'post_show',
            ],
            [
                'id'    => 101,
                'title' => 'post_delete',
            ],
            [
                'id'    => 102,
                'title' => 'post_access',
            ],
            [
                'id'    => 103,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 104,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 105,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 106,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 107,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 108,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 109,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 110,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 111,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 112,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 113,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 114,
                'title' => 'testimony_create',
            ],
            [
                'id'    => 115,
                'title' => 'testimony_edit',
            ],
            [
                'id'    => 116,
                'title' => 'testimony_show',
            ],
            [
                'id'    => 117,
                'title' => 'testimony_delete',
            ],
            [
                'id'    => 118,
                'title' => 'testimony_access',
            ],
            [
                'id'    => 119,
                'title' => 'newsletter_create',
            ],
            [
                'id'    => 120,
                'title' => 'newsletter_edit',
            ],
            [
                'id'    => 121,
                'title' => 'newsletter_show',
            ],
            [
                'id'    => 122,
                'title' => 'newsletter_delete',
            ],
            [
                'id'    => 123,
                'title' => 'newsletter_access',
            ],
            [
                'id'    => 124,
                'title' => 'partner_create',
            ],
            [
                'id'    => 125,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 126,
                'title' => 'partner_show',
            ],
            [
                'id'    => 127,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 128,
                'title' => 'partner_access',
            ],
            [
                'id'    => 129,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 130,
                'title' => 'discount_coupon_create',
            ],
            [
                'id'    => 131,
                'title' => 'discount_coupon_edit',
            ],
            [
                'id'    => 132,
                'title' => 'discount_coupon_show',
            ],
            [
                'id'    => 133,
                'title' => 'discount_coupon_delete',
            ],
            [
                'id'    => 134,
                'title' => 'discount_coupon_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
