<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\FaqQuestion;
use App\Models\Newsletter;
use App\Repositories\BannerRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    public function __construct(
        public BannerRepository $bannerRepository,
        public ProductRepository $productRepository,
    ) { }

    public function index(): View
    {
        $banners  = $this->bannerRepository->all()->groupBy('type');
        $products = $this->productRepository->allToHome()->keyBy('name');

        return view('site.home.index', compact('banners', 'products'));
    }

    public function saveLeadNewsletter(Request $request): RedirectResponse
    {
        Newsletter::updateOrCreate([
                'email' => $request->get('email'),
            ], [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'interest' => $request->get('interest'),
            ]);

        return back()
            ->with('success', 'Você foi cadastrado com sucesso! Aguarde novidades.');
    }

    public function termsOfUse(): View
    {
        return view('site.home.terms-of-use');
    }

    public function faq(): View
    {
        $faqs = FaqQuestion::all();

        return view('site.home.faq', compact('faqs'));
    }

}
