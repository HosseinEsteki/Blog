<?php
enum userActions: string
{
    case Add="Add";
    case Edit="Edit";
    case Delete="Delete";
    case Login="Login";
    case Register="Register";
}
/*
 * It's used for user permission access, for managing Authorization
 * @return string
 */
enum userPermission:string{
    case CreateRole="create-role";
    case EditRole="edit-role";
    case DestroyRole="destroy-role";
    case ShowRole="show-role";
    case IndexRole='index-role';
    case CreateCategory="create-category";
    case EditCategory="edit-category";
    case DestroyCategory="destroy-category";
    case ShowCategory="show-category";
    case IndexCategory='index-category';
    case CreateComment="create-comment";
    case EditComment="edit-comment";
    case DestroyComment="destroy-comment";
    case ShowComment="show-comment";
    case IndexComment='index-comment';
    case CreateTag="create-tag";
    case EditTag="edit-tag";
    case DestroyTag="destroy-tag";
    case ShowTag="show-tag";
    case IndexTag='index-tag';

}
