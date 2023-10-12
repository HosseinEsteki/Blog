<?php

enum UserActions: string
{
    case Add = "افزودن";
    case Edit = "ویرایش";
    case Delete = "حذف";
    case Login = "ورود";
    case Register = "ثبت نام";
}

/*
 * It's used for user permission access, for managing Authorization
 * @return string
 */

enum UserPermission: string
{
    case StoreRole = "افزودن سطح دسترسی";
    case UpdateRole = "ویرایش سطح دسترسی";
    case DestroyRole = "حذف سطح دسترسی";
    case ShowRole = "نمایش سطح دسترسی";
    case IndexRole = 'فهرست سطوح دسترسی';
    case IndexPermission='فهرست نقش‌ها';
    case StoreRolePermission = "ذخیره نقش‌های سطح دسترسی";
    case StoreCategory = "افزودن دسته‌بندی";
    case UpdateCategory = "ویرایش دسته‌بندی";
    case DestroyCategory = "حذف دسته‌بندی";
    case ShowCategory = "نمایش دسته‌بندی";
    case IndexCategory = "فهرست دسته‌بندی‌ها";
    case StoreComment = "افزودن کامنت";
    case UpdateComment = "ویرایش کامنت";
    case DestroyComment = "حذف کامنت";
    case ShowComment = "نمایش کامنت";
    case IndexComment = "فهرست کامنت‌ها";
    case StoreTag = "افزودن برچسب";
    case UpdateTag = "ویرایش برچسب";
    case DestroyTag = "حذف برچسب";
    case ShowTag = "نمایش برچسب";
    case IndexTag = "فهرست برچسب‌ها";
    case IndexAction = "فهرست فعالیت‌ها";
    case StorePhoto="افزودن تصویر";
    case UpdatePhoto='ویرایش تصویر';
    case ShowPhoto='نمایش تصویر';
    case DestroyPhoto='حذف تصویر';
    case IndexPhoto='فهرست تصاویر';
}

enum UserRole: string
{
    case Admin = "ادمین";
    case Golden = "کاربر طلایی";
    case Silver = "کاربر نقره ای";
    case Bronze = "کاربر برنزی";
}

enum Models: string
{
    case Action = 'فعالیت';
    case Category = 'دسته‌بندی';
    case Comment = 'نظر';
    case Permission = 'نقش';
    case Post = 'مقاله';
    case Role = 'سطح دسترسی';
    case Tag = 'برچسب';
    case User = 'کاربر';
    case Photo = 'تصویر';
}
enum PhotoModel:string{
    case User="/images/users/";
    case Post="/images/posts/";
    case Category="/images/categories";
}
