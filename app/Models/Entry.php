<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $table= 'MibEntries';

    protected $fillable = [
        "Alias",
        "BirthDate",
        "FirstName",
        "Gender",
        "LastName",
        "MaidenName",
        "MiddleName",
        "Nationality",
        "Suffix",
        "Title",
        "CompanyId",
        "DownloadStatus",
        "IsShared",
        "MemberId",
        "IsDeactivated",
        "OtherName",
        "BirthPlace",
        "PolicyNumber",
        "ActionCodeId",
        "UnderwritingDate",
        "MemberControlNumber",
        "ActionCode"
    ];


}
