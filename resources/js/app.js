import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

/* mouse */
const cursorOrb = document.getElementById("cursorOrb");
const hoverTargets = document.querySelectorAll(".hover-target");

// This is a single, custom cursor object
const customCursor = {
    x: 0,
    y: 0,
    targetX: 0,
    targetY: 0,
    speed: 0.2, // Controls the "lag" of the cursor
    update: function () {
        // Smoothly interpolate the orb's position to the mouse's position
        this.x += (this.targetX - this.x) * this.speed;
        this.y += (this.targetY - this.y) * this.speed;

        // Apply the new position using CSS transform
        cursorOrb.style.transform = `translate(${this.x}px, ${this.y}px) scale(1)`;
        requestAnimationFrame(this.update.bind(this));
    },
};

// Event listener for mouse movement
document.addEventListener("mousemove", (e) => {
    customCursor.targetX = e.clientX;
    customCursor.targetY = e.clientY;
});

// Event listeners for hover effects
hoverTargets.forEach((target) => {
    target.addEventListener("mouseenter", () => {
        cursorOrb.classList.add("hovering");
    });
    target.addEventListener("mouseleave", () => {
        cursorOrb.classList.remove("hovering");
    });
});

// Start the animation loop when the window loads
window.onload = () => {
    customCursor.update();
};

/* mouse */

/* ON SCROLL HEADER Nav bg-[#f59c00] */
window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    const nav = document.querySelector("header nav");
    const links = nav.querySelectorAll("a");
    if (window.scrollY > 100) {
        header.classList.add("fixed");
        header.classList.remove("relative");
        nav.classList.add("glasseff-scroll");
        /* make width 80%  */
        nav.classList.add("w-[80%]");
        nav.classList.remove("w-full");
        nav.classList.remove("glasseff");
    } else {
        header.classList.add("relative");
        header.classList.remove("fixed");
        nav.classList.remove("glasseff-scroll");
        nav.classList.remove("w-[80%]");
        nav.classList.add("w-full");
        nav.classList.add("glasseff");
    }
});

// AJAX Service Filtering
document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const tagsContainer = document.getElementById("tags-container");
    const loadingSpinner = document.getElementById("loading-spinner");

    // Get current language from URL
    const lang = window.location.pathname.split("/")[1];

    // Add click event listeners to filter buttons
    filterButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const filter = this.dataset.filter;
            const url =
                filter === "all"
                    ? `/${lang}/services/filter`
                    : `/${lang}/services/filter?filter=${filter}`;

            // Show loading spinner
            loadingSpinner.classList.remove("hidden");
            tagsContainer.classList.add("opacity-50");

            // Update active button styles
            filterButtons.forEach((btn) => {
                btn.classList.remove("bg-[#f59c00]", "text-white");
                btn.classList.add("bg-[#f59c00]/10", "text-[#f59c00]");
            });
            this.classList.remove("bg-[#f59c00]/10", "text-[#f59c00]");
            this.classList.add("bg-[#f59c00]", "text-white");

            // Make AJAX request
            fetch(url, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    // Update the tags container with new content
                    tagsContainer.innerHTML = data.html;

                    // Hide loading spinner
                    loadingSpinner.classList.add("hidden");
                    tagsContainer.classList.remove("opacity-50");

                    // Re-initialize animations for the new content
                    initAnimations();

                    // Smooth scroll to top
                    window.scrollTo({
                        top: window.innerHeight * 0.9,
                        behavior: "smooth",
                    });
                })
                .catch((error) => {
                    console.error("Error:", error);
                    loadingSpinner.classList.add("hidden");
                    tagsContainer.classList.remove("opacity-50");
                });
        });
    });
});
// Scroll animation initialization
function initAnimations() {
    const animatedElements = document.querySelectorAll(".animate-on-scroll");

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // Element is entering the viewport (scrolling down)
                    entry.target.classList.add("is-visible");
                } else {
                    // Element is leaving the viewport (scrolling up)
                    entry.target.classList.remove("is-visible");
                }
            });
        },
        {
            threshold: 0.2,
            rootMargin: "0px 0px -50px 0px", // Add some margin to trigger animations earlier
        }
    );

    animatedElements.forEach((element) => {
        // Check if the element is already in the viewport on page load
        const rect = element.getBoundingClientRect();
        const isInViewport =
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <=
                (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <=
                (window.innerWidth || document.documentElement.clientWidth);

        if (isInViewport) {
            // If it's already visible, animate it immediately
            element.classList.add("is-visible");
        }

        // Always observe the element for both scroll directions
        observer.observe(element);
    });
}

// Initialize animations on page load
document.addEventListener("DOMContentLoaded", function () {
    initAnimations();
});

const stack = document.querySelector("#about .stack");
const cards = Array.from(stack.children)
    .reverse()
    .filter((child) => child.classList.contains("pictures"));

cards.forEach((card) => stack.appendChild(card));

function moveCard() {
    const lastCard = stack.lastElementChild;
    if (lastCard.classList.contains("pictures")) {
        lastCard.classList.add("swap");

        setTimeout(() => {
            lastCard.classList.remove("swap");
            stack.insertBefore(lastCard, stack.firstElementChild);
        }, 1200);
    }
}

let autoplayInterval = setInterval(moveCard, 4000);

stack.addEventListener("click", function (e) {
    const card = e.target.closest(".pictures");
    if (card && card === stack.lastElementChild) {
        card.classList.add("swap");

        setTimeout(() => {
            card.classList.remove("swap");
            stack.insertBefore(card, stack.firstElementChild);
        }, 1200);
    }
});

/* service filtering */

/* service filtering */
