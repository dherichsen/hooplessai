<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\Insight;
use App\Models\Page;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected function getSiteSettings(): array
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();

        // Parse offices JSON if stored as string
        if (isset($settings['offices']) && is_string($settings['offices'])) {
            $settings['offices'] = json_decode($settings['offices'], true) ?? [];
        }

        return $settings;
    }

    public function home()
    {
        $page = Page::where('slug', 'home')->first();
        $services = Service::where('is_published', true)->orderBy('order')->limit(3)->get();
        $teamMembers = TeamMember::where('is_published', true)->orderBy('order')->get();

        return view('pages.home', [
            'page' => $page,
            'services' => $services,
            'teamMembers' => $teamMembers,
            'siteSettings' => $this->getSiteSettings(),
        ]);
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->first();
        $teamMembers = TeamMember::where('is_published', true)->orderBy('order')->get();
        $faqs = FaqItem::where('page', 'about')->where('is_published', true)->orderBy('order')->get();

        return view('pages.about', [
            'page' => $page,
            'teamMembers' => $teamMembers,
            'faqs' => $faqs->groupBy('category'),
            'siteSettings' => $this->getSiteSettings(),
        ]);
    }

    public function services()
    {
        $page = Page::where('slug', 'services')->first();
        $services = Service::where('is_published', true)->orderBy('order')->get();

        return view('pages.services', [
            'page' => $page,
            'services' => $services,
            'siteSettings' => $this->getSiteSettings(),
        ]);
    }

    public function projects()
    {
        $page = Page::where('slug', 'projects')->first();
        $projects = Project::where('is_published', true)->orderBy('order')->get();

        return view('pages.projects', [
            'page' => $page,
            'projects' => $projects,
            'siteSettings' => $this->getSiteSettings(),
        ]);
    }

    public function insights()
    {
        $page = Page::where('slug', 'insights')->first();
        $insights = Insight::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        return view('pages.insights', [
            'page' => $page,
            'insights' => $insights,
            'siteSettings' => $this->getSiteSettings(),
        ]);
    }

    public function insightShow(string $slug)
    {
        $insight = Insight::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('pages.insight-show', [
            'insight' => $insight,
            'siteSettings' => $this->getSiteSettings(),
        ]);
    }

    public function contact()
    {
        $page = Page::where('slug', 'contact')->first();
        $services = Service::where('is_published', true)->orderBy('order')->get();

        return view('pages.contact', [
            'page' => $page,
            'services' => $services,
            'siteSettings' => $this->getSiteSettings(),
        ]);
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // TODO: Send email notification or store in DB
        // Mail::to(config('mail.admin'))->send(new ContactFormMail($validated));

        return back()->with('success', 'Thanks for reaching out. We\'ll be in touch shortly.');
    }
}
