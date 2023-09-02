<?php
namespace App\Enums;

enum RolesEnum: string
{
    case ADMIN = 'admin';
    case OWNER = 'owner';
    case USER = 'user';
}
