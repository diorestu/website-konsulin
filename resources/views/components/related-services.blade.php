@php
    $currentRoute = request()->route()?->getName();

    $allServices = collect(config('company-services.items', []));

    $currentService = $allServices->get($currentRoute);

    $relatedRoutes = $currentService['related'] ?? [];

    $relatedServices = collect($relatedRoutes)
        ->map(fn ($route) => $allServices->get($route))
        ->filter()
        ->take(3)
        ->values();
@endphp

@if($relatedServices->isNotEmpty())
    <section class="kons-related-services-section">
        <div class="container">
            <div class="kons-related-services-header">
                <span>Layanan Lainnya</span>
                <h2>Butuh Layanan Lain?</h2>
                <p>
                    Temukan layanan lain yang dapat membantu kebutuhan bisnis, legalitas,
                    pajak, dan pengembangan usaha Anda.
                </p>
            </div>

            <div class="kons-service-card-grid">
                @foreach($relatedServices as $service)
                    <div class="kons-service-page-card">
                        <a href="{{ route($service['route']) }}" class="kons-service-card-image">
                            <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}">
                        </a>

                        <div class="kons-service-card-body">
                            <span>{{ $service['label'] }}</span>

                            <h3>
                                <a href="{{ route($service['route']) }}">
                                    {{ $service['title'] }}
                                </a>
                            </h3>

                            <p>
                                {{ $service['description'] }}
                            </p>

                            @if(!empty($service['items']))
                                <ul>
                                    @foreach($service['items'] as $item)
                                        <li>
                                            <span>✓</span>
                                            {{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <a href="{{ route($service['route']) }}" class="kons-service-card-link">
                                Lihat Detail <i>→</i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif