<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Entry;
use Inertia\Response;
use App\Models\Member;
use App\Models\Upload;
use App\Models\Company;
use App\Models\Download;
use App\Models\EntryAudit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     */
    public function index(): Response
    {
        $data['total'] = [
            'companies' => Company::count(),
            'members' => Member::count(),
            'uploads' => Upload::count(),
            'downloads' => Download::count(),
            'entries' => Entry::count(),
            'inquiries' => EntryAudit::count(),
        ];
        return Inertia::render('Dashboard/Index', $data);
    }
}
