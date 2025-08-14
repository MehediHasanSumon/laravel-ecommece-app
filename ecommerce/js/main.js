// Main JavaScript for ShopEase E-commerce Website

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initMobileMenu();
    initDarkMode();
    initBackToTop();
    initChatWidget();
    initFlashSaleCountdown();
    initProductQuickView();
    initSearchAutocomplete();
    initShoppingCart();
});

// Mobile Menu Toggle
function initMobileMenu() {
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
}

// Dark Mode Toggle
function initDarkMode() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const htmlElement = document.documentElement;
    
    // Check for saved theme preference or use preferred color scheme
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
        htmlElement.classList.add('dark-mode');
        updateDarkModeIcon(true);
    }
    
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            htmlElement.classList.toggle('dark-mode');
            const isDarkMode = htmlElement.classList.contains('dark-mode');
            
            // Save preference to localStorage
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
            
            updateDarkModeIcon(isDarkMode);
        });
    }
}

function updateDarkModeIcon(isDarkMode) {
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (darkModeToggle) {
        const icon = darkModeToggle.querySelector('i');
        if (icon) {
            if (isDarkMode) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        }
    }
}

// Back to Top Button
function initBackToTop() {
    const backToTopButton = document.getElementById('backToTop');
    
    if (backToTopButton) {
        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });
        
        // Scroll to top when clicked
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

// Chat Widget
function initChatWidget() {
    const chatToggle = document.getElementById('chatToggle');
    const chatWidget = document.getElementById('chatWidget');
    const chatClose = document.getElementById('chatClose');
    const chatInput = document.getElementById('chatInput');
    const chatSend = document.getElementById('chatSend');
    const chatMessages = document.getElementById('chatMessages');
    const quickReplyButtons = document.querySelectorAll('#chatMessages button');
    
    if (chatToggle && chatWidget && chatClose) {
        // Toggle chat widget with animation
        chatToggle.addEventListener('click', function() {
            // Remove notification badge when opening chat
            const badge = chatToggle.querySelector('span');
            if (badge) badge.classList.add('hidden');
            
            chatWidget.classList.toggle('hidden');
            setTimeout(() => {
                chatWidget.classList.toggle('scale-95');
                chatWidget.classList.toggle('opacity-0');
                chatWidget.classList.toggle('translate-y-4');
                chatWidget.classList.toggle('active');
            }, 10);
            
            // Focus input field when chat is opened
            setTimeout(() => {
                if (!chatWidget.classList.contains('hidden') && chatInput) {
                    chatInput.focus();
                }
            }, 300);
        });
        
        // Close chat widget with animation
        chatClose.addEventListener('click', function() {
            chatWidget.classList.add('scale-95', 'opacity-0', 'translate-y-4');
            chatWidget.classList.remove('active');
            setTimeout(() => {
                chatWidget.classList.add('hidden');
            }, 300);
        });
        
        // Send message
        if (chatInput && chatSend && chatMessages) {
            chatSend.addEventListener('click', sendChatMessage);
            chatInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendChatMessage();
                }
            });
            
            // Add event listeners to quick reply buttons
            document.addEventListener('click', function(e) {
                if (e.target && e.target.closest('#chatMessages button')) {
                    const buttonText = e.target.textContent.trim();
                    chatInput.value = buttonText;
                    sendChatMessage();
                }
            });
            
            // Add event listeners to predefined question buttons
            const predefinedButtons = document.querySelectorAll('#chatMessages .flex-col button');
            predefinedButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const buttonText = this.textContent.trim();
                    chatInput.value = buttonText;
                    sendChatMessage();
                });
            });
        }
        
        // Show chat widget automatically after 10 seconds if not already shown
        setTimeout(() => {
            if (chatWidget.classList.contains('hidden')) {
                // Pulse animation for chat toggle button
                chatToggle.classList.add('animate-pulse');
                setTimeout(() => {
                    chatToggle.classList.remove('animate-pulse');
                }, 2000);
            }
        }, 10000);
    }
}

function sendChatMessage() {
    const chatInput = document.getElementById('chatInput');
    const chatMessages = document.getElementById('chatMessages');
    
    if (chatInput.value.trim() !== '') {
        const message = chatInput.value;
        const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        
        // Create user message element
        const userMessageHTML = `
            <div class="flex items-end justify-end mb-4">
                <div class="bg-indigo-600 text-white rounded-lg p-3 max-w-3/4 shadow-sm">
                    <p>${message}</p>
                    <span class="text-xs text-indigo-200 mt-1 block">${time}</span>
                </div>
                <div class="h-8 w-8 rounded-full bg-indigo-600 flex items-center justify-center ml-2 mt-1">
                    <i class="fas fa-user text-white"></i>
                </div>
            </div>
        `;
        
        chatMessages.insertAdjacentHTML('beforeend', userMessageHTML);
        chatInput.value = '';
        
        // Show typing indicator
        const typingIndicator = `
            <div class="flex items-start mb-4" id="typingIndicator">
                <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center mr-2 mt-1">
                    <i class="fas fa-user text-indigo-600"></i>
                </div>
                <div class="bg-indigo-100 rounded-lg p-3 max-w-3/4">
                    <div class="flex space-x-1">
                        <div class="bg-gray-500 rounded-full h-2 w-2 animate-bounce"></div>
                        <div class="bg-gray-500 rounded-full h-2 w-2 animate-bounce" style="animation-delay: 0.2s"></div>
                        <div class="bg-gray-500 rounded-full h-2 w-2 animate-bounce" style="animation-delay: 0.4s"></div>
                    </div>
                </div>
            </div>
        `;
        
        chatMessages.insertAdjacentHTML('beforeend', typingIndicator);
        
        // Auto-scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;
        
        // Simulate bot response after a short delay
        setTimeout(() => {
            // Remove typing indicator
            document.getElementById('typingIndicator').remove();
            simulateBotResponse(chatMessages);
        }, 1500);
    }
}

function simulateBotResponse(chatMessages) {
    const botResponses = [
        "Thank you for your message! How can I assist you further?",
        "I'll check that for you right away. Our customer service team is available 24/7.",
        "We have several options available. Would you like me to recommend something based on your preferences?",
        "That item is currently in stock and ready to ship! We offer free shipping on orders over $50.",
        "Is there anything else you'd like to know about our products or services?",
        "I'd be happy to help you with your return. Our policy allows returns within 30 days of purchase.",
        "Your order should arrive within 3-5 business days. Would you like me to send you the tracking information?"
    ];
    
    const randomResponse = botResponses[Math.floor(Math.random() * botResponses.length)];
    const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    
    // Create bot message element
    const botMessageHTML = `
        <div class="flex items-start mb-4">
            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center mr-2 mt-1">
                <i class="fas fa-user text-indigo-600"></i>
            </div>
            <div class="bg-indigo-100 rounded-lg p-3 max-w-3/4 shadow-sm">
                <p class="text-gray-800">${randomResponse}</p>
                <span class="text-xs text-gray-500 mt-1 block">${time}</span>
            </div>
        </div>
    `;
    
    chatMessages.insertAdjacentHTML('beforeend', botMessageHTML);
    
    // Add quick reply options occasionally (30% chance)
    if (Math.random() < 0.3) {
        const quickRepliesHTML = `
            <div class="flex justify-center my-3">
                <div class="flex flex-wrap justify-center gap-2 max-w-xs">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs px-3 py-1 rounded-full transition">
                        Yes, please
                    </button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs px-3 py-1 rounded-full transition">
                        No, thanks
                    </button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs px-3 py-1 rounded-full transition">
                        Tell me more
                    </button>
                </div>
            </div>
        `;
        chatMessages.insertAdjacentHTML('beforeend', quickRepliesHTML);
    }
    
    // Auto-scroll to bottom
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Flash Sale Countdown
function initFlashSaleCountdown() {
    const hoursElement = document.getElementById('hours');
    const minutesElement = document.getElementById('minutes');
    const secondsElement = document.getElementById('seconds');
    
    if (hoursElement && minutesElement && secondsElement) {
        // Set the countdown to 24 hours from now
        const countdownDate = new Date();
        countdownDate.setHours(countdownDate.getHours() + 24);
        
        // Update the countdown every second
        const countdownInterval = setInterval(function() {
            const now = new Date().getTime();
            const distance = countdownDate - now;
            
            // Calculate hours, minutes, and seconds
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Display the result
            hoursElement.textContent = hours.toString().padStart(2, '0');
            minutesElement.textContent = minutes.toString().padStart(2, '0');
            secondsElement.textContent = seconds.toString().padStart(2, '0');
            
            // If the countdown is finished, reset it
            if (distance < 0) {
                clearInterval(countdownInterval);
                countdownDate.setHours(countdownDate.getHours() + 24);
            }
        }, 1000);
    }
}

// Product Quick View
function initProductQuickView() {
    // Add quick view functionality to product cards
    const quickViewButtons = document.querySelectorAll('.product-quick-view');
    
    quickViewButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-product-id');
            openQuickViewModal(productId);
        });
    });
}

function openQuickViewModal(productId) {
    // In a real application, you would fetch product details from an API
    // For this demo, we'll use placeholder content
    
    // Create modal HTML
    const modalHTML = `
        <div class="quick-view-modal" id="quickViewModal">
            <div class="quick-view-content p-6">
                <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700" id="closeQuickView">
                    <i class="fas fa-times text-xl"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="product-images">
                        <img src="images/product-placeholder.svg" alt="Product" class="w-full h-auto rounded-lg">
                        <div class="grid grid-cols-4 gap-2 mt-2">
                            <img src="images/product-placeholder.svg" alt="Thumbnail" class="w-full h-20 object-cover rounded cursor-pointer">
                            <img src="images/product-placeholder.svg" alt="Thumbnail" class="w-full h-20 object-cover rounded cursor-pointer">
                            <img src="images/product-placeholder.svg" alt="Thumbnail" class="w-full h-20 object-cover rounded cursor-pointer">
                            <img src="images/product-placeholder.svg" alt="Thumbnail" class="w-full h-20 object-cover rounded cursor-pointer">
                        </div>
                    </div>
                    <div class="product-details">
                        <h2 class="text-2xl font-bold mb-2">Product Name</h2>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">(42 reviews)</span>
                        </div>
                        <div class="mb-4">
                            <span class="text-gray-400 line-through">$129.99</span>
                            <span class="text-indigo-600 font-bold text-2xl ml-2">$99.99</span>
                            <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded ml-2">20% OFF</span>
                        </div>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, diam quis aliquam faucibus, nisl quam aliquet nunc, quis aliquam nisl nunc eu nisl.</p>
                        <div class="mb-4">
                            <h3 class="font-semibold mb-2">Color:</h3>
                            <div class="flex space-x-2">
                                <button class="w-8 h-8 rounded-full bg-black border-2 border-gray-300"></button>
                                <button class="w-8 h-8 rounded-full bg-blue-500 border-2 border-gray-300"></button>
                                <button class="w-8 h-8 rounded-full bg-red-500 border-2 border-gray-300"></button>
                                <button class="w-8 h-8 rounded-full bg-green-500 border-2 border-gray-300"></button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h3 class="font-semibold mb-2">Size:</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border border-gray-300 rounded hover:border-indigo-500">S</button>
                                <button class="px-3 py-1 border border-gray-300 rounded hover:border-indigo-500">M</button>
                                <button class="px-3 py-1 border border-gray-300 rounded hover:border-indigo-500">L</button>
                                <button class="px-3 py-1 border border-gray-300 rounded hover:border-indigo-500">XL</button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h3 class="font-semibold mb-2">Quantity:</h3>
                            <div class="flex items-center">
                                <button class="px-3 py-1 border border-gray-300 rounded-l hover:bg-gray-100">-</button>
                                <input type="number" value="1" min="1" class="w-16 px-3 py-1 border-t border-b border-gray-300 text-center">
                                <button class="px-3 py-1 border border-gray-300 rounded-r hover:bg-gray-100">+</button>
                            </div>
                        </div>
                        <div class="flex space-x-4 mt-6">
                            <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition flex items-center">
                                <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                            </button>
                            <button class="border border-indigo-600 text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-indigo-600 hover:text-white transition flex items-center">
                                <i class="fas fa-heart mr-2"></i> Wishlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Add modal to the DOM
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    const modal = document.getElementById('quickViewModal');
    const closeButton = document.getElementById('closeQuickView');
    
    // Show modal with animation
    setTimeout(() => {
        modal.classList.add('active');
    }, 10);
    
    // Close modal when close button is clicked
    closeButton.addEventListener('click', function() {
        modal.classList.remove('active');
        setTimeout(() => {
            modal.remove();
        }, 300);
    });
    
    // Close modal when clicking outside the content
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.remove('active');
            setTimeout(() => {
                modal.remove();
            }, 300);
        }
    });
}

// Search Autocomplete
function initSearchAutocomplete() {
    const searchInputs = document.querySelectorAll('input[type="text"][placeholder*="Search"]');
    
    searchInputs.forEach(input => {
        input.addEventListener('focus', function() {
            // Create autocomplete container if it doesn't exist
            let autocompleteContainer = this.parentElement.querySelector('.autocomplete-container');
            
            if (!autocompleteContainer) {
                autocompleteContainer = document.createElement('div');
                autocompleteContainer.className = 'autocomplete-container absolute left-0 right-0 top-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg z-10 hidden';
                this.parentElement.appendChild(autocompleteContainer);
            }
        });
        
        input.addEventListener('input', function() {
            const query = this.value.trim().toLowerCase();
            const autocompleteContainer = this.parentElement.querySelector('.autocomplete-container');
            
            if (query.length > 1 && autocompleteContainer) {
                // In a real application, you would fetch suggestions from an API
                // For this demo, we'll use placeholder suggestions
                const suggestions = [
                    'Wireless Earbuds',
                    'Smart Watch',
                    'Laptop Backpack',
                    'Bluetooth Speaker',
                    'Phone Charger',
                    'Fitness Tracker',
                    'Wireless Mouse',
                    'Keyboard',
                    'Headphones',
                    'USB Drive'
                ].filter(item => item.toLowerCase().includes(query));
                
                if (suggestions.length > 0) {
                    let suggestionsHTML = '';
                    suggestions.forEach(suggestion => {
                        suggestionsHTML += `<div class="p-2 hover:bg-gray-100 cursor-pointer">${suggestion}</div>`;
                    });
                    
                    autocompleteContainer.innerHTML = suggestionsHTML;
                    autocompleteContainer.classList.remove('hidden');
                    
                    // Add click event to suggestions
                    const suggestionElements = autocompleteContainer.querySelectorAll('div');
                    suggestionElements.forEach(element => {
                        element.addEventListener('click', function() {
                            input.value = this.textContent;
                            autocompleteContainer.classList.add('hidden');
                        });
                    });
                } else {
                    autocompleteContainer.classList.add('hidden');
                }
            } else if (autocompleteContainer) {
                autocompleteContainer.classList.add('hidden');
            }
        });
        
        // Hide autocomplete when clicking outside
        document.addEventListener('click', function(e) {
            if (!input.contains(e.target)) {
                const autocompleteContainer = input.parentElement.querySelector('.autocomplete-container');
                if (autocompleteContainer) {
                    autocompleteContainer.classList.add('hidden');
                }
            }
        });
    });
}

// Shopping Cart Functionality
function initShoppingCart() {
    // Initialize cart from localStorage or create empty cart
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    updateCartCount();
    
    // Add to cart buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // In a real application, you would get this data from the product
            const product = {
                id: Math.random().toString(36).substr(2, 9),
                name: 'Product Name',
                price: 99.99,
                image: 'images/product-placeholder.svg',
                quantity: 1
            };
            
            // Check if product is already in cart
            const existingProductIndex = cart.findIndex(item => item.id === product.id);
            
            if (existingProductIndex > -1) {
                // Increase quantity if product already in cart
                cart[existingProductIndex].quantity += 1;
            } else {
                // Add new product to cart
                cart.push(product);
            }
            
            // Save cart to localStorage
            localStorage.setItem('cart', JSON.stringify(cart));
            
            // Update cart count
            updateCartCount();
            
            // Show notification
            showNotification('Product added to cart!');
        });
    });
}

function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
    
    // Update cart count in header
    const cartCountElement = document.querySelector('.fa-shopping-cart + span');
    if (cartCountElement) {
        cartCountElement.textContent = cartCount;
    }
}

function showNotification(message) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 transform translate-y-[-20px] opacity-0 transition-all duration-300';
    notification.textContent = message;
    
    // Add to DOM
    document.body.appendChild(notification);
    
    // Show notification with animation
    setTimeout(() => {
        notification.style.transform = 'translateY(0)';
        notification.style.opacity = '1';
    }, 10);
    
    // Hide and remove after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateY(-20px)';
        notification.style.opacity = '0';
        
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}