<?php require 'db.php'; require 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Othisis Medtech - Ambient AI Medical Scribe</title>
    <meta property="og:title" content=Ambient AI medical scribe>
    <meta property="og:site_name" content=Othisis Medtech>
    <meta property="og:url" content=Othisis.com>
    <meta property="og:description" content=It listens to each visit, digests your PDFs, and turns everything into one
        clear, traceable note without changing how you practice medicine.>
    <meta property="og:type" content="">
    <meta property="og:image" content=https://othisisstatweb.z30.web.core.windows.net/images/othisis_header_logo.png>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top mt-3">
        <div class="container custom-nav-container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <!-- Logo -->
                <img src="images/othisis_header_logo.png" alt="Othisis Medtech Logo" class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-4 align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Product
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Specialities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resources
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="btn-login">Login</a>
                    <a href="#" class="btn btn-primary btn-gradient rounded-pill px-4 py-2 d-flex align-items-center gap-2">
                        Try for Free
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section position-relative d-flex align-items-center text-center overflow-hidden">
        <!-- Floating Elements (Paper Icons) -->
        <!-- Floating Elements (Paper Icons) -->
        <div class="floating-icon icon-1">
            <img src="images/shadow-1.png" alt="" class="shadow-img">
            <img src="images/paper-1.png" alt="Document Icon" class="paper-img img-fluid">
        </div>
        <div class="floating-icon icon-2">
            <img src="images/shadow-2.png" alt="" class="shadow-img">
            <img src="images/paper-2.png" alt="Document Icon" class="paper-img img-fluid">
        </div>
        <div class="floating-icon icon-3">
            <img src="images/shadow-3.png" alt="" class="shadow-img">
            <img src="images/paper-3.png" alt="Document Icon" class="paper-img img-fluid">
        </div>
        <div class="floating-icon icon-4">
            <img src="images/shadow-4.png" alt="" class="shadow-img">
            <img src="images/paper-4.png" alt="Document Icon" class="paper-img img-fluid">
        </div>
        <div class="floating-icon icon-5">
            <img src="images/shadow-1.png" alt="" class="shadow-img">
            <img src="images/paper-5.png" alt="Document Icon" class="paper-img img-fluid">
        </div>

        <div class="container position-relative z-2 hero-content">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="display-3 fw-bold text-dark mb-2">
                        Ambient AI medical scribe and <br>
                        <span class="text-primary-gradient">PDF summarizer for busy clinics</span>
                    </h1>

                    <div class="row justify-content-center mt-4 mb-5">
                        <div class="col-lg-8">
                            <p class="lead text-secondary fs-5">
                                It listens to each visit, digests your PDFs, and turns everything into one clear,
                                traceable note without changing how you practice medicine.
                            </p>
                        </div>
                    </div>

                    <div class="d-block mb-3">
                        <a href="#"
                            class="btn btn-lg btn-primary btn-gradient-hero rounded-pill px-5 py-3 d-inline-flex align-items-center gap-2 shadow-lg">
                            Try for Free
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="d-block">
                        <span class="mt-4 text-muted small hero-bottom-text">
                            Othisis is a documentation catalyst for small and midsize clinics.
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Warped Grid -->
        <div class="hero-background-grid position-absolute bottom-0 w-100">
            <img src="images/hero-bg.png" alt="Background Grid" class="w-100 object-fit-cover"
                style="height: 60vh; mask-image: linear-gradient(to top, black, transparent);">
        </div>
    </section>

    <!-- How it Works Section -->
    <section class="py-5 position-relative bg-white" id="how-it-works">
        <div class="container-fluid py-5">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold">
                    How Othisis <span class="text-primary-gradient fst-italic">cuts your<br>documentation time</span>
                </h2>
            </div>

            <div class="row align-items-center justify-content-center g-4">
                <!-- Left Tabs -->
                <div class="col-lg-3 d-flex flex-column gap-5 justify-content-center mt-0">
                    <div class="feature-pill active" data-target="0" data-image="images/transcription_ui.png"
                        data-caption="Captures the full visit as you talk, and allows you to view the entire conversation in the Transcription panel next to the summary.">
                        <span class="fw-medium">Transcription</span>
                    </div>
                    <div class="feature-pill t2" data-target="1" data-image="images/traceability_ui.png"
                        data-caption="Easily trace every summary point back to the exact moment in the transcript where it was discussed.">
                        <span class="fw-medium">Traceability</span>
                    </div>
                    <div class="feature-pill t3" data-target="2" data-image="images/version_history_ui.png"
                        data-caption="Keep track of all edits and changes made to the documentation with a comprehensive version history.">
                        <span class="fw-medium">Version History</span>
                    </div>
                    <div class="feature-pill t4" data-target="3" data-image="images/transcription_ui.png"
                        data-caption="Generate accurate, structured medical summaries in seconds using advanced AI tailored for clinical workflows.">
                        <span class="fw-medium">Summarize with AI</span>
                    </div>
                </div>

                <!-- Center Image Display -->
                <div class="col-lg-6 text-center position-relative">
                    <div class="feature-main-visual position-relative">
                        <!-- Background Circle -->
                        <div class="feature-bg-circle">
                            <img src="images/feature_bg_circle.png" alt="" class="img-fluid">
                        </div>

                        <!-- Connecting Lines Background (Handled via CSS) -->
                        <div class="connection-lines"></div>

                        <div class="feature-visual-content d-flex flex-column align-items-center position-relative z-2">
                            <div class="feature-image-wrapper p-2 bg-white rounded-4 shadow-lg d-inline-block mb-4">
                                <img src="images/central_ui_main.png" alt="Feature UI" class="img-fluid rounded-3"
                                    id="featureImage" style="max-height: 500px; width: auto;">
                            </div>
                            <!-- Dynamic Caption -->
                            <p id="featureCaption" class="feature-caption text-secondary fs-5 text-center px-4" style="max-width: 600px; opacity: 1; transition: opacity 0.3s ease;">
                                Captures the full visit as you talk, and allows you to view the entire conversation in the Transcription panel next to the summary.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Tabs -->
                <div class="col-lg-3 d-flex flex-column gap-5 justify-content-center text-end mt-0">
                    <div class="feature-pill right-pill t5" data-target="4" data-image="images/transcription_ui.png"
                        data-caption="Generate structured SOAP notes automatically from your consultation.">
                        <span class="fw-medium">SOAP Notes</span>
                    </div>
                    <div class="feature-pill right-pill t6" data-target="5" data-image="images/transcription_ui.png"
                        data-caption="Provide patients with a clear, layman-friendly summary of their visit.">
                        <span class="fw-medium">Patient Summary</span>
                    </div>
                    <div class="feature-pill right-pill t7" data-target="6" data-image="images/transcription_ui.png"
                        data-caption="Draft referral letters to specialists with all necessary context included.">
                        <span class="fw-medium">Doctor Referral</span>
                    </div>
                    <div class="feature-pill right-pill t8" data-target="7" data-image="images/transcription_ui.png"
                        data-caption="Automatically generate detailed documentation for insurance claims.">
                        <span class="fw-medium">Insurance Summary</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Engines Section -->
    <section class="py-5 bg-white position-relative" id="core-engines">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold">
                    Two core engines.<br>
                    <span class="text-primary-gradient fst-italic">One complete note.</span>
                </h2>
            </div>

            <div class="row align-items-center g-5">
                <!-- Left Column: UI Preview with Tabs -->
                <div class="col-lg-7">
                    <div class="engine-card position-relative overflow-hidden rounded-4 p-4 d-flex flex-column justify-content-between"
                        style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%); min-height: 500px;">
                        <!-- Image Display -->
                        <div
                            class="engine-image-wrapper flex-grow-1 d-flex align-items-center justify-content-center mb-4">
                            <img src="images/transcription_ui.png" alt="Engine UI" id="engineImage"
                                class="img-fluid rounded-3 shadow-lg"
                                style="max-height: 350px; width: auto; object-fit: contain;">
                        </div>

                        <!-- Internal Tabs -->
                        <div
                            class="engine-tabs-container bg-white bg-opacity-10 backdrop-blur rounded-pill p-1 d-inline-flex mx-auto align-self-center">
                            <button class="btn btn-sm rounded-pill engine-tab active text-white" data-index="0"
                                data-image="images/transcription_ui.png">Transcription</button>
                            <button class="btn btn-sm rounded-pill engine-tab text-white bg-transparent opacity-75"
                                data-index="1" data-image="images/traceability_ui.png">Traceability</button>
                            <button class="btn btn-sm rounded-pill engine-tab text-white bg-transparent opacity-75"
                                data-index="2" data-image="images/version_history_ui.png">Version history</button>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Text Content -->
                <div class="col-lg-5">
                    <!-- Engine Content 0: Transcription -->
                    <div id="engine-content-0" class="engine-content-block ps-lg-4">
                        <h3 class="h1 fw-bold mb-4 text-primary">Ambient AI scribe for<br>every consult</h3>
                        <div class="mb-3 d-flex align-items-start gap-3">
                            <img src="images/blue_arrow_icon.png" alt="" width="24" class="mt-1 flex-shrink-0">
                            <p class="mb-0 fs-5 text-secondary">Captures the full conversation quietly in the background</p>
                        </div>
                        <div class="mb-3 d-flex align-items-start gap-3">
                            <img src="images/blue_arrow_icon.png" alt="" width="24" class="mt-1 flex-shrink-0">
                            <p class="mb-0 fs-5 text-secondary">Drafts structured notes tailored to your specialty</p>
                        </div>
                        <div class="mb-3 d-flex align-items-start gap-3">
                            <img src="images/blue_arrow_icon.png" alt="" width="24" class="mt-1 flex-shrink-0">
                            <p class="mb-0 fs-5 text-secondary">Keeps transcript and summary tied together line-by-line</p>
                        </div>
                    </div>

                    <!-- Engine Content 1: Traceability -->
                    <div id="engine-content-1" class="engine-content-block ps-lg-4 d-none">
                        <h3 class="h1 fw-bold mb-4 text-primary">Trace every detail<br>back to the source</h3>
                        <div class="mb-3 d-flex align-items-start gap-3">
                            <img src="images/blue_arrow_icon.png" alt="" width="24" class="mt-1 flex-shrink-0">
                            <p class="mb-0 fs-5 text-secondary">Click any summary point to hear the exact audio clip</p>
                        </div>
                        <div class="mb-3 d-flex align-items-start gap-3">
                            <img src="images/blue_arrow_icon.png" alt="" width="24" class="mt-1 flex-shrink-0">
                            <p class="mb-0 fs-5 text-secondary">Verify AI suggestions with one-click evidential support</p>
                        </div>
                        <div class="mb-3 d-flex align-items-start gap-3">
                            <img src="images/blue_arrow_icon.png" alt="" width="24" class="mt-1 flex-shrink-0">
                            <p class="mb-0 fs-5 text-secondary">Build trust with fully transparent AI documentation</p>
                        </div>
                    </div>

                    <!-- Engine Content 2: Version History -->
                    <div id="engine-content-2" class="engine-content-block ps-lg-4 d-none">
                        <h3 class="h1 fw-bold mb-4 text-primary">Complete history of<br>every change</h3>
                        <div class="mb-3 d-flex align-items-start gap-3">
                            <img src="images/blue_arrow_icon.png" alt="" width="24" class="mt-1 flex-shrink-0">
                            <p class="mb-0 fs-5 text-secondary">Track edits from draft to final sign-off automatically</p>
                        </div>
                        <div class="mb-3 d-flex align-items-start gap-3">
                            <img src="images/blue_arrow_icon.png" alt="" width="24" class="mt-1 flex-shrink-0">
                            <p class="mb-0 fs-5 text-secondary">Compare versions side-by-side to see what changed</p>
                        </div>
                        <div class="mb-3 d-flex align-items-start gap-3">
                            <img src="images/blue_arrow_icon.png" alt="" width="24" class="mt-1 flex-shrink-0">
                            <p class="mb-0 fs-5 text-secondary">Never lose a note with comprehensive audit logs</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Row: PDF Chaos Section (Flipped Layout) -->
            <div class="row align-items-center g-5 mt-5">
                <!-- Left Column: Text Content -->
                <div class="col-lg-5 order-2 order-lg-1">

                    <!-- PDF Content 0 -->
                    <div id="pdf-content-0" class="pdf-content-block pe-lg-4">
                        <h3 class="h1 fw-bold mb-4 text-dark">Turn PDF chaos into a<br><span
                                class="text-primary-gradient">clean, structured data</span></h3>
                        <p class="fs-5 text-secondary mb-4">
                            Reduce the administrative burden of searching through unorganized historical records.
                            Othisis rapidly extracts and groups information into a structured view for your
                            verification.
                        </p>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/blue_arrow_icon.png" alt="" width="24" class="flex-shrink-0">
                                <span class="fs-5 text-secondary">Streamline Patient Intake & Data Entry</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/blue_arrow_icon.png" alt="" width="24" class="flex-shrink-0">
                                <span class="fs-5 text-secondary">Patient Profile & Background</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/blue_arrow_icon.png" alt="" width="24" class="flex-shrink-0">
                                <span class="fs-5 text-secondary">History & Condition Mentions</span>
                            </div>
                        </div>
                    </div>

                    <!-- PDF Content 1 -->
                    <div id="pdf-content-1" class="pdf-content-block pe-lg-4 d-none">
                        <h3 class="h1 fw-bold mb-4 text-dark">Automated File<br><span
                                class="text-primary-gradient">Organization & Saving</span></h3>
                        <p class="fs-5 text-secondary mb-4">
                            Files are automatically renamed and filed into the correct patient charts, ensuring nothing
                            gets lost in the shuffle.
                        </p>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/blue_arrow_icon.png" alt="" width="24" class="flex-shrink-0">
                                <span class="fs-5 text-secondary">Auto-renaming based on content</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/blue_arrow_icon.png" alt="" width="24" class="flex-shrink-0">
                                <span class="fs-5 text-secondary">Direct integration with your EHR logic</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/blue_arrow_icon.png" alt="" width="24" class="flex-shrink-0">
                                <span class="fs-5 text-secondary">Bulk processing capabilities</span>
                            </div>
                        </div>
                    </div>

                    <!-- PDF Content 2 -->
                    <div id="pdf-content-2" class="pdf-content-block pe-lg-4 d-none">
                        <h3 class="h1 fw-bold mb-4 text-dark">Intelligent Document<br><span
                                class="text-primary-gradient">Merging & Analysis</span></h3>
                        <p class="fs-5 text-secondary mb-4">
                            Combine multiple related documents into a single, cohesive file for easier review and
                            longitudinal tracking.
                        </p>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/blue_arrow_icon.png" alt="" width="24" class="flex-shrink-0">
                                <span class="fs-5 text-secondary">Merge similar lab reports automatically</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/blue_arrow_icon.png" alt="" width="24" class="flex-shrink-0">
                                <span class="fs-5 text-secondary">Longitudinal analysis of past records</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/blue_arrow_icon.png" alt="" width="24" class="flex-shrink-0">
                                <span class="fs-5 text-secondary">Spot trends across multiple visits</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Column: UI Preview with Tabs -->
                <div class="col-lg-7 order-1 order-lg-2">
                    <div class="engine-card position-relative overflow-hidden rounded-4 p-4 d-flex flex-column justify-content-between"
                        style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%); min-height: 500px;">
                        <!-- Image Display -->
                        <div
                            class="engine-image-wrapper flex-grow-1 d-flex align-items-center justify-content-center mb-4">
                            <img src="images/pdf_chaos_ui.png" alt="PDF UI" id="pdfImage"
                                class="img-fluid rounded-3 shadow-lg"
                                style="max-height: 350px; width: auto; object-fit: contain;">
                        </div>

                        <!-- Internal Tabs -->
                        <div
                            class="engine-tabs-container bg-white bg-opacity-10 backdrop-blur rounded-pill p-1 d-inline-flex mx-auto align-self-center">
                            <button class="btn btn-sm rounded-pill engine-tab pdf-tab active text-white"
                                data-pdf-index="0" data-image="images/pdf_chaos_ui.png">Summarize with AI</button>
                            <button
                                class="btn btn-sm rounded-pill engine-tab pdf-tab text-white bg-transparent opacity-75"
                                data-pdf-index="1" data-image="images/structured_data_ui.png">Save files</button>
                            <button
                                class="btn btn-sm rounded-pill engine-tab pdf-tab text-white bg-transparent opacity-75"
                                data-pdf-index="2" data-image="images/pdf_chaos_ui.png">Merge</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Animation Section -->
    <section class="py-5 bg-white position-relative overflow-hidden" id="timeline-section">
        <div class="container py-5 position-relative">
            <div class="text-center mb-5 pb-5">
                <h2 class="display-5 fw-bold text-dark">
                    Othisis will be<br>
                    <span class="text-primary-gradient fst-italic">with you at all time.</span>
                </h2>
            </div>

            <!-- SVG Connector Lines (Removed as per user request) -->


            <div class="row text-center position-relative justify-content-center" style="z-index: 1;">
                
            
            <svg class="connecting-arrows" viewBox="0 0 1000 150">
            <path class="placeholder-line" d="M 150 100 C 350 0, 450 0, 500 100"></path>
            <path class="placeholder-line" d="M 500 100 C 550 0, 650 0, 850 100"></path>

            <path id="blue-arrow-1" class="animated-line" d="M 150 100 C 350 0, 450 0, 500 100"></path>
            <path id="blue-arrow-2" class="animated-line" d="M 500 100 C 550 0, 650 0, 850 100"></path>
        </svg>
            
            <!-- Step 1: Top Level -->
                <div class="col-lg-3 col-md-6 mb-5 timeline-step active" data-step="0">
                    <div class="d-flex flex-column align-items-center">
                        <span
                            class="badge rounded-pill bg-white text-primary border border-primary-subtle px-3 py-2 mb-4 shadow-sm position-relative z-2">Before
                            visit</span>
                        <div
                            class="timeline-card-blue mb-4 shadow-lg rounded-4 d-flex align-items-center justify-content-center position-relative overflow-hidden p-3">
                            <div class="grid-overlay"></div>
                            <i class="bi bi-upload text-white display-4 position-relative z-1"></i>
                        </div>
                        <p class="text-secondary small px-3">Upload past records to instantly index key data for your
                            pre-visit review</p>
                    </div>
                </div>

                <!-- Step 2: Staggered Down (pt-5) -->
                <div class="col-lg-3 col-md-6 mb-5 timeline-step pt-lg-5 mt-lg-3" data-step="1">
                    <div class="d-flex flex-column align-items-center">
                        <span
                            class="badge rounded-pill bg-white text-primary border border-primary-subtle px-3 py-2 mb-4 shadow-sm position-relative z-2">During
                            visit</span>
                        <div
                            class="timeline-card-blue mb-4 shadow-lg rounded-4 d-flex align-items-center justify-content-center position-relative overflow-hidden p-3">
                            <div class="grid-overlay"></div>
                            <i class="bi bi-soundwave text-white display-4 position-relative z-1"></i>
                        </div>
                        <p class="text-secondary small px-3">Let Othisis transcribe everything you say in the background
                            during the session</p>
                    </div>
                </div>

                <!-- Step 3: Staggered Further Down (pt-5 mt-5) -->
                <div class="col-lg-3 col-md-6 mb-0 timeline-step pt-lg-5 mt-lg-5" data-step="2">
                    <div class="d-flex flex-column align-items-center">
                        <span
                            class="badge rounded-pill bg-white text-primary border border-primary-subtle px-3 py-2 mb-4 shadow-sm position-relative z-2">After
                            visit</span>
                        <div
                            class="timeline-card-blue mb-4 shadow-lg rounded-4 d-flex align-items-center justify-content-center position-relative overflow-hidden p-3">
                            <div class="grid-overlay"></div>
                            <i class="bi bi-file-text text-white display-4 position-relative z-1"></i>
                        </div>
                        <p class="text-secondary small px-3">Trace the transcribed summary for authenticity and export
                            in your desired formats</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison Section: How Othisis is Different -->
    <section class="py-5 bg-light position-relative" id="comparison-section">
        <div class="container py-5">
            
            <div class="row g-4 justify-content-center align-items-stretch">
                <!-- Column 1: Features -->
                <div class="col-lg-4">
                    <div class="cmp-col cmp-features-col h-100">
                        <div class="cmp-features-header">
                            <i class="bi bi-tools text-dark"></i>
                            Features
                        </div>
                        <ul class="cmp-features-list">
                            <li class="cmp-feature-item">
                                <span class="d-flex align-items-center h-100">Trust & Transparency</span>
                            </li>
                            <li class="cmp-feature-item">
                                <span class="d-flex align-items-center h-100">Regulatory Safety</span>
                            </li>
                            <li class="cmp-feature-item">
                                <span class="d-flex align-items-center h-100">Pre-Visit Prep (PDFs)</span>
                            </li>
                            <li class="cmp-feature-item">
                                <span class="d-flex align-items-center h-100">Your Role</span>
                            </li>
                            <li class="cmp-feature-item">
                                <span class="d-flex align-items-center h-100">Output Format</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Column 2: Othisis Medtech -->
                <div class="col-lg-4">
                    <div class="cmp-col cmp-othisis-col h-100">
                        <div class="cmp-othisis-header">
                            <img src="images/othisis_green_logo.png" alt="Othisis Medtech" height="40" class=""> 
                            <!-- Removed filters as per new green logo, ensuring it fits -->
                        </div>
                        <div class="cmp-othisis-list">
                            <div class="cmp-othisis-item">
                                <div class="cmp-othisis-title">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    100% Traceable
                                </div>
                                <div class="cmp-othisis-desc">
                                    Click any point in the draft to instantly see the original source proof. You never have to guess.
                                </div>
                            </div>
                            <div class="cmp-othisis-item">
                                <div class="cmp-othisis-title">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    Administrative Support
                                </div>
                                <div class="cmp-othisis-desc">
                                    Positioned as a non-medical workflow tool. We organize data; you make the clinical decisions.
                                </div>
                            </div>
                             <div class="cmp-othisis-item">
                                <div class="cmp-othisis-title">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    Deep-Link Indexing
                                </div>
                                <div class="cmp-othisis-desc">
                                    Turns 100+ page records into a clickable Table of Contents so you can prep in seconds.
                                </div>
                            </div>
                             <div class="cmp-othisis-item">
                                <div class="cmp-othisis-title">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    The Pilot
                                </div>
                                <div class="cmp-othisis-desc">
                                    Othisis prepares the runway (drafts and indexes), but you land the plane (final review and sign-off).
                                </div>
                            </div>
                             <div class="cmp-othisis-item">
                                <div class="cmp-othisis-title">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    Structured Drafts
                                </div>
                                <div class="cmp-othisis-desc">
                                    Explicitly labeled as "Drafts" to ensure human oversight and compliance.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 3: Others -->
                <div class="col-lg-4">
                    <div class="cmp-col cmp-others-col h-100">
                        <div class="cmp-others-header">
                            <i class="bi bi-soundwave text-dark"></i>
                            Others
                        </div>
                         <div class="cmp-others-list">
                            <div class="cmp-others-item">
                                <div class="cmp-others-title">
                                    "Black Box" AI
                                </div>
                                <div class="cmp-others-desc">
                                    Generates text without showing where it came from. You must blindly trust the output or manually search for errors.
                                </div>
                            </div>
                            <div class="cmp-others-item">
                                <div class="cmp-others-title">
                                    High-Risk "Clinical Brains"
                                </div>
                                <div class="cmp-others-desc">
                                    Often market themselves as "AI Doctors" or "Residents," inviting higher regulatory scrutiny and liability.
                                </div>
                            </div>
                             <div class="cmp-others-item">
                                <div class="cmp-others-title">
                                    Generic Summaries
                                </div>
                                <div class="cmp-others-desc">
                                    Often provide a vague overview that misses critical details, with no way to jump back to the original page.
                                </div>
                            </div>
                             <div class="cmp-others-item">
                                <div class="cmp-others-title">
                                    The Passenger
                                </div>
                                <div class="cmp-others-desc">
                                    The AI attempts to drive the clinical encounter, often overstepping into diagnostic territory.
                                </div>
                            </div>
                             <div class="cmp-others-item">
                                <div class="cmp-others-title">
                                    "Finished" Notes
                                </div>
                                <div class="cmp-others-desc">
                                    Often present outputs as final, authoritative clinical records, increasing the risk of automation bias.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Security & Compliance Section (Refactored) -->
    <section class="sec-section" id="security-section">
        <div class="container position-relative">
            <div class="row align-items-center">
                
                <!-- Left Column Cards -->
                <div class="col-lg-4 d-flex flex-column justify-content-center">
                    <div class="sec-card">
                        <div class="sec-icon-box">
                            <i class="bi bi-shield-plus"></i> <!-- Host/Shield icon -->
                        </div>
                        <div class="sec-card-content">
                            <span class="sec-card-title">HIPAA-Compliant<br>Hosting</span>
                        </div>
                    </div>
                    
                    <div class="sec-card">
                        <div class="sec-icon-box">
                            <i class="bi bi-lock"></i> <!-- Lock icon -->
                        </div>
                        <div class="sec-card-content">
                            <span class="sec-card-title">Encryption at Rest &<br>In Transit</span>
                        </div>
                    </div>

                    <div class="sec-card">
                        <div class="sec-icon-box">
                            <i class="bi bi-person-badge"></i> <!-- ID/Access icon -->
                        </div>
                        <div class="sec-card-content">
                            <span class="sec-card-title">Access Control &<br>Role-Based Permissions</span>
                        </div>
                    </div>

                    <div class="sec-card">
                        <div class="sec-icon-box">
                            <i class="bi bi-people"></i> <!-- Workforce icon -->
                        </div>
                        <div class="sec-card-content">
                            <span class="sec-card-title">HIPAA Training for<br>Workforce</span>
                        </div>
                    </div>
                </div>

                <!-- Center Column: Shield & Text -->
                <div class="col-lg-4 position-relative">
                    <div class="sec-shield-container">
                        <!-- Shield Background Image -->
                        <img src="images/security_shield.png" alt="Security Shield" class="sec-shield-bg">
                        
                        <div class="sec-center-text">
                            <h2>
                                Secure by default.<br>
                                <span class="text-gradient-blue">Transparent by design.</span>
                            </h2>
                            <p>
                                Enterprise-grade security that meets the highest healthcare standards.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column Cards -->
                <div class="col-lg-4 d-flex flex-column justify-content-center">
                    <div class="sec-card">
                        <div class="sec-icon-box">
                            <i class="bi bi-exclamation-triangle"></i> <!-- Risk icon -->
                        </div>
                        <div class="sec-card-content">
                            <span class="sec-card-title">Vendor Risk<br>Management</span>
                        </div>
                    </div>

                    <div class="sec-card">
                        <div class="sec-icon-box">
                            <i class="bi bi-hdd-network"></i> <!-- Backup/Server icon -->
                        </div>
                        <div class="sec-card-content">
                            <span class="sec-card-title">Data Backup &<br>Recovery Plan</span>
                        </div>
                    </div>

                    <div class="sec-card">
                        <div class="sec-icon-box">
                            <i class="bi bi-exclamation-circle"></i> <!-- Incident icon -->
                        </div>
                        <div class="sec-card-content">
                            <span class="sec-card-title">Incident Response<br>Plan</span>
                        </div>
                    </div>
                    
                    <div class="sec-card">
                        <div class="sec-icon-box">
                            <i class="bi bi-journal-text"></i> <!-- Log icon -->
                        </div>
                        <div class="sec-card-content">
                            <span class="sec-card-title">Audit Logging</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- New CTA Section -->
    <section class="py-5 bg-white">
        <div class="container mb-5">
            <div class="cta-blue-card position-relative overflow-hidden rounded-5 p-5 d-flex align-items-center">
                
                <!-- Background Circles (CSS preferred or images) -->
                <div class="cta-circle circle-1"></div>
                <div class="cta-circle circle-2"></div>
                <div class="cta-circle circle-3"></div>

                <div class="row w-100 position-relative z-2 align-items-center">
                    <div class="col-lg-7">
                        <h2 class="display-5 fw-bold text-white mb-4">
                            Stop stitching notes together<br>
                            <span class="fst-italic opacity-75">from memory and PDFs.</span>
                        </h2>
                        <p class="text-white opacity-75 fs-5 mb-4" style="max-width: 500px;">
                            Othisis listens to the visit, digests your PDFs, and pulls everything into one note you can actually trust.
                        </p>
                        
                        <a href="#" class="btn btn-light rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2 text-primary fw-bold cta-btn-custom">
                            Try for Free
                            <i class="bi bi-arrow-right-circle-fill fs-5 text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="site-footer">
        <!-- Curved Top Background -->
        <div class="footer-curve">
            <img src="images/footer_bg_curve.png" alt="Curve">
        </div>

        <div class="container footer-content">
            <div class="row gy-5 justify-content-between">
                <!-- Logo Layout -->
                <div class="col-lg-3 col-md-12">
                   <div class="footer-logo">
                        <img src="images/othisis_header_logo.png" alt="Othisis Medtech" height="40">
                   </div>
                </div>

                <!-- Features -->
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-heading">Features</h5>
                    <ul class="footer-links">
                        <li><a href="#">AI Transcription</a></li>
                        <li><a href="#">PDF to Summary</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-heading">Resources</h5>
                    <ul class="footer-links">
                        <li><a href="blog">Blogs</a></li>
                        <li><a href="#">HIPAA Compliance</a></li>
                        <li><a href="#">Security</a></li>
                        <li><a href="#">Legal & Privacy</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-heading">Company</h5>
                    <ul class="footer-links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>

                <!-- Social -->
                <div class="col-lg-2 col-md-12">
                     <h5 class="footer-heading">Follow us at</h5>
                     <div class="footer-social">
                         <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a> <!-- X icon -->
                         <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                         <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                         <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                     </div>
                </div>
            </div>

            <!-- Subscribe Section -->
            <div class="footer-subscribe-wrapper">
                <h3>Subscribe to Othisis</h3>
                <div class="subscribe-form">
                    <input type="email" class="subscribe-input" placeholder="Enter your Email">
                    <button class="subscribe-btn">Subscribe</button>
                </div>
            </div>
        </div>

        <!-- Watermark -->
        <div class="footer-watermark">
            <img src="images/footer_othisis_text.png" alt="Othisis">
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="script.js"></script>
</body>

</html>