<?php

namespace App\Traits;

use App\Rules\ArabicRule;

trait AdminRules {

    protected function changePasswordRules(): array
    {
        return [
            'password' => 'required|string|min:8|max:16|confirmed|regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/',
        ];
    }

    protected function createAdminRules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:60', 'string', function ($attribute, $value, $fail) {
                $names = explode(' ', $value);
                if (count($names) < 2)
                    $fail('You must enter first and last name at least');
            }],
            'email' => 'required|email|unique:admins,email|unique:vendors,email|unique:managers,email',
            'phone' => 'required|numeric|unique:users,phone|unique:admins,phone|unique:vendors,phone|unique:managers,phone',
            'password' => 'required|string|min:8|max:16' /*|regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/' */,
            'avatar' => 'nullable|max:20480|image',
        ];
    }

    protected function createVendorRules(): array
    {
        return [
            'added_by' => 'required|exists:admins,id,active,1',
            'name' => 'required|max:60|string',
            'owner_name' => ['required', 'min:5', 'max:60', 'string', function ($attribute, $value, $fail) {
                $names = explode(' ', $value);
                if (count($names) < 2)
                    $fail('You must enter first and last name at least');
            }],
            'crn' => 'required|numeric|unique:vendors,crn', /*|regex: style of crn', */
            'email' => 'required|email|unique:admins,email|unique:vendors,email|unique:managers,email',
            'phone' => 'required|numeric|unique:users,phone|unique:admins,phone|unique:vendors,phone|unique:managers,phone',
            'password' => 'required|string|min:8|max:16' /*|regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/' */,
            'avatar' => 'required|max:20480|image',
            'city_id' => 'required|exists:cities,id,active,1',
            'delivery_time' => 'required|numeric|max:120',
            'delivery_cost' => 'required|numeric|max:100',
        ];
    }

    protected function createManagerRules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:60', 'string', function ($attribute, $value, $fail) {
                $names = explode(' ', $value);
                if (count($names) < 2)
                    $fail('You must enter first and last name at least');
            }],
            'email' => 'required|email|unique:admins,email|unique:vendors,email|unique:managers,email',
            'phone' => 'required|numeric|unique:users,phone|unique:admins,phone|unique:vendors,phone|unique:managers,phone',
            'password' => 'required|string|min:8|max:16' /*|regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/' */,
            'avatar' => 'nullable|max:20480|image',
            'added_by' => 'required|exists:vendors,id,active,1',
        ];
    }

    protected function createAdRules(): array
    {
        return [
            'name' => 'required|max:60|string',
            'image' => 'required|max:20480|image',
        ];
    }

    protected function createAddressRules(): array
    {
        return [
            'type' => 'required|in:vendor',
            'user_id' => 'required|exists:vendors,id',
            'city_id' => 'required|exists:cities,id,active,1',
            'address' => 'required|max:60|string',
            'main' => 'nullable|in:1',
        ];
    }

    protected function createNotificationRules(): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'body_en' => 'required|max:1000|string',
            'body_ar' => ['required', 'max:1000', new ArabicRule(), 'string'],
            'image' => 'nullable|max:20480|image',
            'type' => 'required|in:admin,vendor',
            'user_id' => 'required'
        ];
    }

    protected function createCategoryRules(): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'avatar' => 'required|max:20480|image',
        ];
    }

    protected function createSubcategoryRules(): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'category_id' => 'required|exists:categories,id,active,1',
            'avatar' => 'required|max:20480|image',
        ];
    }

    protected function createProductRules(): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'subcategory_id' => 'required|exists:subcategories,id,active,1',
            'avatar' => 'required|max:20480|image',
        ];
    }

    protected function createComponentRules(): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'vendor_id' => 'required|exists:vendors,id,active,1',
        ];
    }

    protected function createTypeRules(): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'abbrev_en' => 'required|max:3|string',
            'abbrev_ar' => ['required', 'max:3', new ArabicRule(), 'string'],
            'vendor_id' => 'required|exists:vendors,id,active,1',
        ];
    }

    protected function countryRules(): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
        ];
    }

    protected function cityRules(): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'country_id' => 'required|exists:countries,id,active,1',
        ];
    }

    protected function updateAdminRules($id): array
    {
        return [
            'name' => ['required', 'max:60', 'string', function ($attribute, $value, $fail) {
                $names = explode(' ', $value);
                if (count($names) < 2)
                    $fail('You must enter first and last name at least');
            }],
            'username' => 'required|unique:admins,username,' . $id,
            'email' => 'required|email|unique:vendors,email|unique:managers,email|unique:admins,email,' . $id,
            'phone' => 'required|numeric|unique:users,phone|unique:vendors,phone|unique:managers,phone|unique:admins,phone,' . $id,
            'password' => 'nullable|string|min:8|max:16' /*|regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/' */,
            'avatar' => 'nullable|max:20480|image',
            'lang' => 'nullable|in:en,ar',
        ];
    }

    protected function updateVendorRules($id): array
    {
        return [
            'name' => 'required|max:60|string',
            'owner_name' => ['required', 'min:5', 'max:60', 'string', function ($attribute, $value, $fail) {
                $names = explode(' ', $value);
                if (count($names) < 2)
                    $fail('You must enter first and last name at least');
            }],
            'username' => 'required|unique:vendors,username,' . $id,
            'crn' => 'required|numeric|unique:vendors,crn,' . $id, /*|regex: style of crn', */
            'email' => 'required|email|unique:admins,email|unique:managers,email|unique:vendors,email,' . $id,
            'phone' => 'required|numeric|unique:admins,phone|unique:users,phone|unique:managers,phone|unique:vendors,phone,' . $id,
            'city_id' => 'required|exists:cities,id,active,1',
            'delivery_time' => 'required|numeric|max:120',
            'delivery_cost' => 'required|numeric||max:100',
            'priority' => 'required|numeric|in:1,2,3',
            'lang' => 'in:en,ar',
        ];
    }

    protected function updateManagerRules($id): array
    {
        return [
            'name' => ['required', 'max:60', 'string', function ($attribute, $value, $fail) {
                $names = explode(' ', $value);
                if (count($names) < 2)
                    $fail('You must enter first and last name at least');
            }],
            'username' => 'required|unique:managers,username,' . $id,
            'email' => 'required|email|unique:admins,email|unique:vendors,email|unique:managers,email,' . $id,
            'phone' => 'required|numeric|unique:admins,phone|unique:users,phone|unique:vendors,phone|unique:managers,phone,' . $id,
            'password' => 'nullable|string|min:8|max:16' /*|regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/' */,
            'avatar' => 'nullable|max:20480|image',
        ];
    }

    protected function updateAdRules($id): array
    {
        return [
            'name' => 'required|max:60|string',
            'image' => 'nullable|max:20480|image',
        ];
    }

    protected function updateAddressRules($id): array
    {
        return [
            'city_id' => 'required|exists:cities,id,active,1',
            'address' => 'required|max:60|string',
            'main' => 'nullable||in:1',
        ];
    }

    protected function updateNotificationRules($id): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'body_en' => 'required|max:1000|string',
            'body_ar' => ['required', 'max:1000', new ArabicRule(), 'string'],
            'image' => 'nullable|max:20480|image'
        ];
    }

    protected function updateCategoryRules($id): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'avatar' => 'nullable|max:20480|image',
        ];
    }

    protected function updateSubcategoryRules($id): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'category_id' => 'required|exists:categories,id,active,1',
            'avatar' => 'nullable|max:20480|image',
        ];
    }

    protected function updateProductRules($id): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'subcategory_id' => 'required|exists:subcategories,id,active,1',
            'avatar' => 'nullable|max:20480|image',
        ];
    }

    protected function updateComponentRules($id): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string']
        ];
    }

    protected function updateTypeRules($id): array
    {
        return [
            'name_en' => 'required|max:60|string',
            'name_ar' => ['required', 'max:60', new ArabicRule(), 'string'],
            'abbrev_en' => 'required|max:3|string',
            'abbrev_ar' => ['required', 'max:3', new ArabicRule(), 'string'],
        ];
    }
}
