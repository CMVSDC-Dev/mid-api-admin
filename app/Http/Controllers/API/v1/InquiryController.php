<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/search",
     *     tags={"Inquiry"},
     *     summary="Inquiry",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="FirstName",
     *         in="query",
     *         description="First Name",
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
     *         name="MiddleName",
     *         in="query",
     *         description="Middle Name",
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
     *         name="Alias",
     *         in="query",
     *         description="Alias",
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
     *         name="CompanyCode",
     *         in="query",
     *         description="Company Code",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *
     *     @OA\Parameter(
     *         name="WildSearch",
     *         in="query",
     *         description="WildSearch",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="Successful"),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */
    public function search(Request $request)
    {
        $FirstName = $request->input('FirstName');
        $LastName = $request->input('LastName');
        $MiddleName = $request->input('MiddleName');
        $MaidenName = $request->input('MaidenName');
        $Alias = $request->input('Alias');
        $Gender = $request->input('Gender');
        $CompanyCode = $request->input('CompanyCode');
        $WildSearch = $request->input('WildSearch');

        $query = DB::table('MibEntries')
            ->join('MibImpairments', 'MibEntries.Id', '=', 'MibImpairments.MibEntryId');

        // Add where clauses only if the request inputs are not empty
        if (!empty($FirstName)) {
            $query->orWhere('MibEntries.FirstName', 'LIKE', '%' . $FirstName . '%');
        }
        if (!empty($LastName)) {
            $query->orWhere('MibEntries.LastName', 'LIKE', '%' . $LastName . '%');
        }
        if (!empty($MiddleName)) {
            $query->orWhere('MibEntries.MiddleName', 'LIKE', '%' . $MiddleName . '%');
        }
        if (!empty($MaidenName)) {
            $query->orWhere('MibEntries.MaidenName', 'LIKE', '%' . $MaidenName . '%');
        }
        if (!empty($Alias)) {
            $query->orWhere('MibEntries.Alias', 'LIKE', '%' . $Alias . '%');
        }
        if (!empty($Gender)) {
            $query->orWhere('MibEntries.Gender', 'LIKE', '%' . $Gender . '%');
        }
        if (!empty($CompanyCode)) {
            $query->orWhere('MibEntries.CompanyCode', 'LIKE', '%' . $CompanyCode . '%');
        }

        if(!empty($WildSearch)){
            $query->where('MibEntries.FirstName', 'LIKE', '%' . $WildSearch . '%');
            $query->orWhere('MibEntries.LastName', 'LIKE', '%' . $WildSearch . '%');
            $query->orWhere('MibEntries.MiddleName', 'LIKE', '%' . $WildSearch . '%');
            $query->orWhere('MibEntries.MaidenName', 'LIKE', '%' . $WildSearch . '%');
            $query->orWhere('MibEntries.Alias', 'LIKE', '%' . $WildSearch . '%');
            $query->orWhere('MibEntries.Gender', 'LIKE', '%' . $WildSearch . '%');
            $query->orWhere('MibEntries.CompanyCode', 'LIKE', '%' . $WildSearch . '%');
        }

        $query->select('MibEntries.Alias', 'MibEntries.BirthDate', 'MibEntries.FirstName', 'MibEntries.Gender', 'MibEntries.lastName',
        'MibEntries.MaidenName', 'MibEntries.MiddleName', 'MibEntries.Nationality', 'MibEntries.Suffix', 'MibEntries.DownloadStatus', 'MibEntries.IsShared',
        'MibEntries.IsDeactivated',  'MibEntries.BirthPlace', 'MibEntries.PolicyNumber',  'MibEntries.UnderwritingDate', 'MibEntries.ActionCode',  'MibEntries.CompanyCode',
        'MibImpairments.ImpairmentDate', 'MibImpairments.ReportedDate', 'MibImpairments.EncodeDate', 'MibImpairments.Remarks', 'MibImpairments.NewImpairmentCode', 'MibImpairments.vr',
        'MibImpairments.LetterCode', 'MibImpairments.ImpairmentCodes', 'MibImpairments.NumberCode');
        $entries = $query->get();

        return response()->json($entries);
    }
}
