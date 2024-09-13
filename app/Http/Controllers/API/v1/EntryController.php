<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\EntryResource;
use App\Http\Resources\EntryCollection;

class EntryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/entry",
     *     tags={"Entry"},
     *     summary="Get Entries",
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="500", description="Login Required"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function index(Request $request)
    {
        return new EntryCollection(Entry::limit(5)->get());
    }

    /**
     * @OA\Get(
     *     path="/api/entry/{id}",
     *     tags={"Entry"},
     *     summary="Get a single entry by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="User details"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function show(Request $request, Entry $entry)
    {
        return new EntryResource($entry);
    }

    /**
     * @OA\Post(
     *     path="/api/entry",
     *     tags={"Entry"},
     *     summary="Store Entry",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="Alias",
     *         in="query",
     *         description="Alias",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="BirthDate",
     *         in="query",
     *         description="Birth Date",
     *         required=true,
     *         @OA\Schema(type="string", format="date", example="YYYY-MM-DD")
     *     ),
     *     @OA\Parameter(
     *         name="FirstName",
     *         in="query",
     *         description="First Name",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="Gender",
     *         in="query",
     *         description="Gender",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="LastName",
     *         in="query",
     *         description="Last Name",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="MaidenName",
     *         in="query",
     *         description="Maiden Name",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="MiddleName",
     *         in="query",
     *         description="Middle Name",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *
     *     @OA\Parameter(
     *         name="Nationality",
     *         in="query",
     *         description="Nationality",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *
     *     @OA\Parameter(
     *         name="Suffix",
     *         in="query",
     *         description="Suffix",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="Title",
     *         in="query",
     *         description="Title",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="CompanyId",
     *         in="query",
     *         description="Company Id",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="DownloadStatus",
     *         in="query",
     *         description="Download Status",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="IsShared",
     *         in="query",
     *         description="Is Shared",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="MemberId",
     *         in="query",
     *         description="Member Id",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="IsDeactivated",
     *         in="query",
     *         description="Is Deactivated",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="OtherName",
     *         in="query",
     *         description="Other Name",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="BirthPlace",
     *         in="query",
     *         description="Birth Place",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="PolicyNumber",
     *         in="query",
     *         description="Policy Number",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="ActionCodeId",
     *         in="query",
     *         description="Action Code Id",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="UnderwritingDate",
     *         in="query",
     *         description="Underwriting Date",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="MemberControlNumber",
     *         in="query",
     *         description="MemberControlNumber",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="ActionCode",
     *         in="query",
     *         description="Action Code",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="Login successful"),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */
    public function store(Request $request, Entry $entry)
    {
        $validated = $request->validate([
            "BirthDate" => "required|date",
            "FirstName" => "required|max:255",
            "Gender" => "required|max:10",
            "LastName" => "required",
            "MaidenName" => "max:255",
            "MiddleName" => "max:255",
            "Nationality" => "max:255",
            "Suffix" => "max:255",
            "Title" => "max:10",
            "CompanyId" => "integer",
            "DownloadStatus" => "max:255",
            "IsShared" => "boolean",
            "MemberId" => "integer",
            "IsDeactivated" => "boolean",
            "OtherName" => "max:255",
            "BirthPlace" => "max:255",
            "PolicyNumber" => "required|max:255",
            "ActionCodeId" => "max:255",
            "UnderwritingDate" => "date",
            "MemberControlNumber" => "required|max:255",
            "ActionCode" => "max:255",
            // "CompanyCode" => "max:10"
        ]);

        $entry = Entry::create($validated);

        return new EntryResource($entry);
    }
}
