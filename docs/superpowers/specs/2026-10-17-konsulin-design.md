# Konsulin public website

Approved direction: Laravel 13, Inertia React; Indonesian tax and accounting consultancy for SMEs and businesses. Simple, professional, calm and premium. Brand anchors #0096c7 and #14213d. Apply antislop during development.

## Scope
One complete public homepage: split hero, service explorer, company approach, working process, FAQ, consultation form. Separate privacy page. No invented testimonials, client logos, qualifications or business metrics. Architectural photos illustrate business context, not Konsulin offices or employees. Real contact details can be added later.

## Visual system
Split Studio structure, light blue-tinted paper, navy text, sky blue accent. Manrope display and Inter body: contemporary rounded headings paired with highly legible operational copy. N1 compact navigation justified by just two content destinations plus consultation action; Ft1 masthead footer. Mobile disclosure navigation. Flat surfaces, restrained radii, one elevated hero annotation. No decorative gradient or endless animation.

## Interaction
Service explorer replaces detail content with an opacity/translate transition. Native FAQ disclosure. Scroll reveals once, using IntersectionObserver. Keyboard focus, reduced motion, 44px touch targets. No scroll hijacking. Verify 320, 375, 414, 768 and desktop widths.

## Data and backend
POST /konsultasi validates name, email, optional company, service, message, consent and anti-spam honeypot. Persist to SQLite consultation_requests. Throttle requests, never expose leads publicly, CSRF protection via Laravel web middleware. No external email/WhatsApp integration until configured. Success confirms storage only. Privacy page discloses storage and lack of external delivery.

## Verification
Feature tests: Inertia pages, valid lead stored, invalid input and missing consent rejected, service allowlist and throttle enforced. TypeScript/build checks; browser desktop/mobile, menu, service explorer, FAQ, form errors/success, reduced motion and console health.
