// Script to handle navbar scroll effect
window.addEventListener('scroll', function () {
    const nav = document.querySelector('.navbar');
    const navContainer = document.querySelector('.custom-nav-container');

    if (window.scrollY > 50) {
        // Scrolled State: Full width, no top space, solid white
        nav.classList.remove('mt-3');
        nav.style.marginTop = '0';
        nav.style.padding = '0';

        navContainer.classList.remove('container', 'rounded-pill', 'shadow-sm', 'border');
        navContainer.classList.add('container-fluid', 'rounded-0', 'shadow-md', 'px-5');

        navContainer.style.background = '#ffffff';
        navContainer.style.maxWidth = '100%';
    } else {
        // Initial State: Floating pill
        nav.classList.add('mt-3');
        nav.style.marginTop = '';
        nav.style.padding = '';

        navContainer.classList.add('container', 'rounded-pill', 'shadow-sm', 'border');
        navContainer.classList.remove('container-fluid', 'rounded-0', 'shadow-md', 'px-5');

        navContainer.style.background = 'rgba(255, 255, 255, 0.95)';
        navContainer.style.maxWidth = ''; // Reverts to CSS
    }
});

// Feature Carousel Logic (How Othisis cuts documentation time)
const featureTabs = document.querySelectorAll('.feature-pill');
const featureImage = document.getElementById('featureImage');
const featureCaption = document.getElementById('featureCaption');

let featureIndex = 0;
let featureInterval;

console.log('Feature Pills found:', featureTabs.length);

function activateFeatureTab(index) {
    if (!featureTabs[index]) return;

    console.log('Activating feature tab:', index);

    // Reset all tabs
    featureTabs.forEach(tab => tab.classList.remove('active'));

    // Activate current
    const activeTab = featureTabs[index];
    activeTab.classList.add('active');

    // Update Content using Data Attributes
    if (featureImage) {
        featureImage.style.opacity = '0';
        setTimeout(() => {
            featureImage.src = activeTab.dataset.image;
            featureImage.style.opacity = '1';
        }, 200);
    }

    if (featureCaption) {
        featureCaption.style.opacity = '0';
        setTimeout(() => {
            featureCaption.textContent = activeTab.dataset.caption;
            featureCaption.style.opacity = '1';
        }, 200);
    }

    featureIndex = index;
}

function startFeatureAutoPlay() {
    clearInterval(featureInterval);
    console.log('Starting auto-play with 5 second interval');
    featureInterval = setInterval(() => {
        let nextIndex = (featureIndex + 1) % featureTabs.length;
        console.log('Auto-rotating to index:', nextIndex);
        activateFeatureTab(nextIndex);
    }, 5000);
}

if (featureTabs.length > 0) {
    featureTabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            activateFeatureTab(index);
            startFeatureAutoPlay();
        });
    });
    // Start auto-play immediately on page load
    startFeatureAutoPlay();
}


// Core Engines Carousel Logic
const engineTabs = document.querySelectorAll('.engine-tab:not(.pdf-tab)');
const engineImage = document.getElementById('engineImage');
const engineContentBlocks = document.querySelectorAll('.engine-content-block');

let engineIndex = 0;
let engineInterval;

function switchEngineTab(index) {
    if (index >= engineTabs.length) index = 0;

    // Update Content Visibility
    engineContentBlocks.forEach(block => block.classList.add('d-none'));
    const targetBlock = document.getElementById(`engine-content-${index}`);
    if (targetBlock) {
        // Simple fade in effect via CSS animation class if desired, or just show
        targetBlock.classList.remove('d-none');
        targetBlock.classList.add('fade-in-text'); // We can define this utility
    }

    // Update Image
    if (engineImage) {
        engineImage.classList.add('fade-out');
        setTimeout(() => {
            engineImage.src = engineTabs[index].dataset.image;
            engineImage.classList.remove('fade-out');
        }, 400);
    }

    // Update Tabs
    engineTabs.forEach(t => t.classList.remove('active'));
    engineTabs[index].classList.add('active');

    engineIndex = index;
}

function startEngineAutoPlay() {
    clearInterval(engineInterval);
    engineInterval = setInterval(() => {
        let nextIndex = (engineIndex + 1) % engineTabs.length;
        switchEngineTab(nextIndex);
    }, 5000);
}

if (engineTabs.length > 0) {
    engineTabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            switchEngineTab(index);
            startEngineAutoPlay();
        });
    });
    startEngineAutoPlay();
}


// PDF Chaos Carousel Logic
const pdfTabs = document.querySelectorAll('.pdf-tab');
const pdfImage = document.getElementById('pdfImage');
const pdfContentBlocks = document.querySelectorAll('.pdf-content-block');

let pdfIndex = 0;
let pdfInterval;

function switchPdfTab(index) {
    if (index >= pdfTabs.length) index = 0;

    // Update Content Visibility
    pdfContentBlocks.forEach(block => block.classList.add('d-none'));
    const targetBlock = document.getElementById(`pdf-content-${index}`);
    if (targetBlock) {
        targetBlock.classList.remove('d-none');
        targetBlock.classList.add('fade-in-text');
    }

    // Update Image
    if (pdfImage) {
        pdfImage.classList.add('fade-out');
        setTimeout(() => {
            pdfImage.src = pdfTabs[index].dataset.image;
            pdfImage.classList.remove('fade-out');
        }, 400);
    }

    // Update Tabs
    pdfTabs.forEach(t => t.classList.remove('active'));
    pdfTabs[index].classList.add('active');

    pdfIndex = index;
}

function startPdfAutoPlay() {
    clearInterval(pdfInterval);
    pdfInterval = setInterval(() => {
        let nextIndex = (pdfIndex + 1) % pdfTabs.length;
        switchPdfTab(nextIndex);
    }, 5000);
}

if (pdfTabs.length > 0) {
    pdfTabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            switchPdfTab(index);
            startPdfAutoPlay();
        });
    });
    startPdfAutoPlay();
}

// Timeline Auto-Rotation Logic (Othisis will be with you at all time)
const timelineSteps = document.querySelectorAll('.timeline-step');
let timelineIndex = 0;
let timelineInterval;

console.log('Timeline steps found:', timelineSteps.length);

function activateTimelineStep(index) {
    if (!timelineSteps[index]) return;

    console.log('Activating timeline step:', index);

    // Remove active class from all steps
    timelineSteps.forEach(step => step.classList.remove('active'));

    // Add active class to current step
    timelineSteps[index].classList.add('active');

    timelineIndex = index;
}

function startTimelineAutoPlay() {
    clearInterval(timelineInterval);
    console.log('Starting timeline auto-play with 5 second interval');
    timelineInterval = setInterval(() => {
        let nextIndex = (timelineIndex + 1) % timelineSteps.length;
        console.log('Auto-rotating timeline to index:', nextIndex);
        activateTimelineStep(nextIndex);
    }, 5000);
}

if (timelineSteps.length > 0) {
    // Add click handlers
    timelineSteps.forEach((step, index) => {
        step.addEventListener('click', () => {
            activateTimelineStep(index);
            startTimelineAutoPlay();
        });
    });
    // Start auto-play immediately on page load
    startTimelineAutoPlay();
}

// Timeline Animation Logic (Fully Disabled/Removed as requested)
// The Arrow HTML elements have been removed from index.html.
// No JS logic is needed for the timeline.

// Category Horizontal Scroll
const categoryWrapper = document.getElementById('categoryWrapper');
const scrollLeftBtn = document.getElementById('scrollLeft');
const scrollRightBtn = document.getElementById('scrollRight');

if (categoryWrapper && scrollLeftBtn && scrollRightBtn) {
    scrollLeftBtn.addEventListener('click', () => {
        categoryWrapper.scrollBy({ left: -200, behavior: 'smooth' });
    });

    scrollRightBtn.addEventListener('click', () => {
        categoryWrapper.scrollBy({ left: 200, behavior: 'smooth' });
    });
}

// Category Active State & Pagination Logic
const categoryBtns = document.querySelectorAll('.category-btn');
const blogItems = document.querySelectorAll('.blog-item');
const prevPageBtn = document.getElementById('prevPage');
const nextPageBtn = document.getElementById('nextPage');
const pageIndicator = document.getElementById('pageIndicator');
const paginationContainer = document.getElementById('paginationContainer');

let currentPage = 1;
const itemsPerPage = 6; // Show 6 items per page (2 rows)
let currentCategory = 'all';

function updateDisplay() {
    // 1. Filter Items
    const filteredItems = Array.from(blogItems).filter(item => {
        return currentCategory === 'all' || item.dataset.category === currentCategory;
    });

    // 2. Calculate Pagination
    const totalPages = Math.ceil(filteredItems.length / itemsPerPage);

    // Ensure current page is valid
    if (currentPage > totalPages) currentPage = 1;
    if (currentPage < 1) currentPage = 1;

    // 3. Update UI Items (Show/Hide based on Page + Filter)
    blogItems.forEach(item => item.classList.add('d-none')); // Hide all first

    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const itemsToShow = filteredItems.slice(startIndex, endIndex);

    itemsToShow.forEach(item => {
        item.classList.remove('d-none');
        // Add fade-in animation logic here if needed
    });

    // 4. Update Pagination Controls
    if (filteredItems.length === 0) {
        paginationContainer.classList.add('d-none');
    } else {
        paginationContainer.classList.remove('d-none');
        pageIndicator.textContent = `${currentPage} / ${totalPages > 1 ? totalPages : 1}`;

        // Disable/Enable buttons
        if (prevPageBtn) prevPageBtn.disabled = currentPage === 1;
        if (nextPageBtn) nextPageBtn.disabled = currentPage === totalPages || totalPages === 0;

        // Optional: Visual styling for disabled state
        if (prevPageBtn) prevPageBtn.style.opacity = currentPage === 1 ? '0.5' : '1';
        if (nextPageBtn) nextPageBtn.style.opacity = (currentPage === totalPages || totalPages === 0) ? '0.5' : '1';
    }
}

if (categoryBtns.length > 0) {
    // Init with default (Page 1, All)
    // Run after DOM load to ensure everything is ready
    setTimeout(updateDisplay, 100);

    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            // Remove active from all
            categoryBtns.forEach(b => b.classList.remove('active'));
            // Add to click
            this.classList.add('active');

            // Update Category & Reset Page
            currentCategory = this.dataset.category;
            currentPage = 1;
            updateDisplay();
        });
    });

    // Pagination Event Listeners
    if (prevPageBtn) {
        prevPageBtn.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                updateDisplay();
            }
        });
    }

    if (nextPageBtn) {
        nextPageBtn.addEventListener('click', () => {
            // Calculate max pages again needed for check
            const filteredCount = Array.from(blogItems).filter(item => {
                return currentCategory === 'all' || item.dataset.category === currentCategory;
            }).length;
            const totalPages = Math.ceil(filteredCount / itemsPerPage);

            if (currentPage < totalPages) {
                currentPage++;
                updateDisplay();
            }
        });
    }
}
// Changelog Version Filtering logic
const versionBtns = document.querySelectorAll('.version-btn');
const changelogCards = document.querySelectorAll('.changelog-card');

if (versionBtns.length > 0) {
    // Default: Show V1 only
    filterChangelog('v1');

    versionBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            // Remove active from all
            versionBtns.forEach(b => b.classList.remove('active'));
            // Add to click
            this.classList.add('active');

            // Filter
            const version = this.dataset.version;
            filterChangelog(version);
        });
    });
}

function filterChangelog(version) {
    changelogCards.forEach(card => {
        if (card.dataset.version === version) {
            card.classList.remove('d-none');
            // Reset animation if needed
            card.style.animation = 'none';
            card.offsetHeight; /* trigger reflow */
            card.style.animation = 'fadeIn 0.5s'; // Assuming a simple fade in keyframe exists or uses default transition
        } else {
            card.classList.add('d-none');
        }
    });
}


