<?php
enum userActions: string
{
    case Add="افزودن";
    case Edit="ویرایش";
    case Delete="حذف";
    case Login="ورود";
    case Register="ثبت نام";
}
/*
 * It's used for user permission access, for managing Authorization
 * @return string
 */

enum userPermission:string{
    case CreateRole="ایجاد سطح دسترسی";
    case EditRole="ویرایش سطح دسترسی";
    case DestroyRole="حذف سطح دسترسی";
    case ShowRole="نمایش سطح دسترسی";
    case IndexRole='فهرست سطوح دسترسی';
    case CreateCategory=    "ایجاد دسته‌بندی";
    case EditCategory=      "ویرایش دسته‌بندی";
    case DestroyCategory=   "حذف دسته‌بندی";
    case ShowCategory=      "نمایش دسته‌بندی";
    case IndexCategory=     "فهرست دسته‌بندی‌ها";
    case CreateComment=     "ایجاد کامنت";
    case EditComment=       "ویرایش کامنت";
    case DestroyComment=    "حذف کامنت";
    case ShowComment=       "نمایش کامنت";
    case IndexComment=      "فهرست کامنت‌ها";
    case CreateTag=         "ایجاد برچسب";
    case EditTag=           "ویرایش برچسب";
    case DestroyTag=        "حذف برچسب";
    case ShowTag=           "نمایش برچسب";
    case IndexTag=          "فهرست برچسب‌ها";
    const IndexAction =     "فهرست فعالیت‌ها";
}
enum userRole:string{
    case Admin="ادمین";
    case Golden="کاربر طلایی";
    case Silver="کاربر نقره ای";
    case Bronze="کاربر برنزی";
}
