<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impairment extends Model
{
    use HasFactory;

    protected $table= 'MibImpairments';

    protected $fillable = [
        // "MemberControlNumber",
        "MibEntryId",
        "ImpairmentCodeId",
        "NumberId",
        "LetterId",
        "NewImpairmentCode",
        "ImpairmentCodes",
        "NumberCode",
        "LetterCode" ,
        "ImpairmentDate",
        "ReportedDate",
        "EncodeDate",
        "IsShared",
        "Remarks",
        "OldImpairmentCode",
        "ActionCodeId",
        "IsDeactivated",
        "ActionCode",
        "UnderwritingDate",
        "vr"
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->timestamps = false;
    }
}
