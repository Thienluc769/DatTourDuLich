document.addEventListener("DOMContentLoaded", function () {
    function initValidation() {
        const inputs = {
            enterprise_name: document.querySelector(
                'input[name="enterprise_name"]'
            ),
            tax_code: document.querySelector('input[name="tax_code"]'),
            address: document.querySelector('input[name="address"]'),
            landline: document.querySelector('input[name="landline"]'),
            enterprise_email: document.querySelector(
                'input[name="enterprise_email"]'
            ),
        };

        const nextBtn = document.querySelector("#step1 .next-btn");

        function validateField(input, shouldShowError = false) {
            if (!input) return false;

            const value = input.value.trim();
            let isValid = false;

            switch (input.name) {
                case "enterprise_name":
                    isValid = value.length > 5;
                    break;
                case "tax_code":
                    isValid = /^\d{10}$/.test(value);
                    break;
                case "address":
                    isValid = value.length > 5;
                    break;
                case "landline":
                    isValid = /^\d{10}$/.test(value);
                    break;
                case "enterprise_email":
                    isValid = /^[^\s@]+@gmail\.com$/.test(value);
                    break;
            }

            if (!shouldShowError && value === "") {
                input.style.borderColor = "";
            } else {
                input.style.borderColor = isValid ? "#28a745" : "#dc3545";
            }

            return isValid;
        }

        function validateForm() {
            let isValid = true;
            Object.values(inputs).forEach((input) => {
                if (!validateField(input)) {
                    isValid = false;
                }
            });

            if (nextBtn) {
                nextBtn.disabled = !isValid;
                if (isValid) {
                    nextBtn.style.opacity = "1";
                    nextBtn.style.cursor = "pointer";
                } else {
                    nextBtn.style.opacity = "0.5";
                    nextBtn.style.cursor = "not-allowed";
                }
            }
        }

        Object.values(inputs).forEach((input) => {
            if (input) {
                let hasInteracted = false;

                input.addEventListener("input", () => {
                    hasInteracted = true;
                    validateField(input, hasInteracted);
                    validateForm();
                });

                input.addEventListener("blur", () => {
                    hasInteracted = true;
                    validateField(input, hasInteracted);
                    validateForm();
                });

                validateField(input, false);
            }
        });

        validateForm();
    }

    function updateProgress(step) {
        const progress = document.querySelector(".progress");
        const progressSteps = document.querySelectorAll(".step");

        if (!progress || !progressSteps.length) return;

        const percent = ((step - 1) / (progressSteps.length - 1)) * 100;
        progress.style.width = percent + "%";

        progressSteps.forEach((stepElement, index) => {
            if (index < step) {
                stepElement.classList.add("active");
            } else {
                stepElement.classList.remove("active");
            }
        });
    }

    function handleNavigation() {
        const nextBtn1 = document.querySelector("#step1 .next-btn");
        if (nextBtn1) {
            nextBtn1.onclick = function () {
                document.getElementById("step1").style.display = "none";
                document.getElementById("step2").style.display = "block";
                updateProgress(2);
            };
        }

        const nextBtn2 = document.querySelector("#step2 .next-btn");
        if (nextBtn2) {
            nextBtn2.onclick = function () {
                document.getElementById("step2").style.display = "none";
                document.getElementById("step3").style.display = "block";
                updateProgress(3);
            };
        }

        const backBtn2 = document.querySelector("#step2 .back-btn");
        if (backBtn2) {
            backBtn2.onclick = function () {
                document.getElementById("step2").style.display = "none";
                document.getElementById("step1").style.display = "block";
                updateProgress(1);
            };
        }

        const backBtn3 = document.querySelector("#step3 .back-btn");
        if (backBtn3) {
            backBtn3.onclick = function () {
                document.getElementById("step3").style.display = "none";
                document.getElementById("step2").style.display = "block";
                updateProgress(2);
            };
        }
    }

    updateProgress(1);
    handleNavigation();

    initValidation();

    function initValidationStep2() {
        const inputs = {
            representative_name: document.querySelector(
                'input[name="representative_name"]'
            ),
            position: document.querySelector('input[name="position"]'),
            phone: document.querySelector('input[name="phone"]'),
            representative_email: document.querySelector(
                'input[name="representative_email"]'
            ),
        };

        const nextBtn = document.querySelector("#step2 .next-btn");

        function validateField(input, shouldShowError = false) {
            if (!input) return false;

            const value = input.value.trim();
            let isValid = false;

            switch (input.name) {
                case "representative_name":
                    isValid = value.length > 5;
                    break;
                case "position":
                    isValid = value.length > 0;
                    break;
                case "phone":
                    isValid = /^\d{10}$/.test(value);
                    break;
                case "representative_email":
                    isValid = /^[^\s@]+@gmail\.com$/.test(value);
                    break;
            }

            if (!shouldShowError && value === "") {
                input.style.borderColor = "";
            } else {
                input.style.borderColor = isValid ? "#28a745" : "#dc3545";
            }

            return isValid;
        }

        function validateForm() {
            let isValid = true;
            Object.values(inputs).forEach((input) => {
                if (!validateField(input)) {
                    isValid = false;
                }
            });

            if (nextBtn) {
                nextBtn.disabled = !isValid;
                if (isValid) {
                    nextBtn.style.opacity = "1";
                    nextBtn.style.cursor = "pointer";
                } else {
                    nextBtn.style.opacity = "0.5";
                    nextBtn.style.cursor = "not-allowed";
                }
            }
        }

        Object.values(inputs).forEach((input) => {
            if (input) {
                let hasInteracted = false;

                input.addEventListener("input", () => {
                    hasInteracted = true;
                    validateField(input, hasInteracted);
                    validateForm();
                });

                input.addEventListener("blur", () => {
                    hasInteracted = true;
                    validateField(input, hasInteracted);
                    validateForm();
                });

                validateField(input, false);
            }
        });

        validateForm();
    }

    initValidationStep2();

    function initValidationStep3() {
        const inputs = {
            password: document.querySelector('input[name="password"]'),
            re_password: document.querySelector('input[name="re_password"]'),
        };

        const enterpriseEmail = document.querySelector(
            'input[name="enterprise_email"]'
        );
        const usernameInput = document.querySelector('input[name="username"]');

        if (enterpriseEmail && usernameInput) {
            enterpriseEmail.addEventListener("input", function () {
                usernameInput.value = this.value;
            });
        }

        const registerBtn = document.querySelector("#step3 .save-btn");

        function validateField(input, shouldShowError = false) {
            if (!input) return false;

            const value = input.value;
            let isValid = false;

            switch (input.name) {
                case "password":
                    isValid = value.length > 5;
                    break;
                case "re_password":
                    const password = document.querySelector(
                        'input[name="password"]'
                    ).value;
                    isValid = value === password && value.length > 0;
                    break;
            }

            if (!shouldShowError && value === "") {
                input.style.borderColor = "";
            } else {
                input.style.borderColor = isValid ? "#28a745" : "#dc3545";
            }

            return isValid;
        }

        function validateForm() {
            let isValid = true;
            Object.values(inputs).forEach((input) => {
                if (!validateField(input)) {
                    isValid = false;
                }
            });

            if (registerBtn) {
                registerBtn.disabled = !isValid;
                if (isValid) {
                    registerBtn.style.opacity = "1";
                    registerBtn.style.cursor = "pointer";
                } else {
                    registerBtn.style.opacity = "0.5";
                    registerBtn.style.cursor = "not-allowed";
                }
            }
        }

        if (enterpriseEmail && usernameInput) {
            usernameInput.value = enterpriseEmail.value;
            usernameInput.readOnly = true;
        }

        Object.values(inputs).forEach((input) => {
            if (input) {
                ["input", "blur"].forEach((eventType) => {
                    input.addEventListener(eventType, () => {
                        validateField(input);
                        validateForm();
                    });
                });
            }
        });

        validateForm();
    }

    initValidationStep3();

    function handleRegistration() {
        const form = document.querySelector('#enterprise-register-form');
        
        form.addEventListener('submit', function(e) {
            console.log('Form submitting...');
            
            const formData = new FormData(this);
            for (let pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }
            
            return true;
        });
    }

    handleRegistration();

    const homeBtn = document.querySelector(".btn-return-home");
    if (homeBtn) {
        homeBtn.onclick = function () {
            window.location.href = "/";
        };
    }

    // Khởi tạo flatpickr cho ngày sinh
    const birthdayInput = document.getElementById("birthday");
    if (birthdayInput) {
        const flatpickrInstance = flatpickr(birthdayInput, {
            dateFormat: "d/m/Y",
            locale: "vn",
            maxDate: new Date(),
            disableMobile: true,
            allowInput: true,
            altInput: true,
            altFormat: "d/m/Y",
            dateFormat: "Y-m-d",
            showMonths: 1,
            animate: true,
            placeholder: "Chọn ngày sinh",
            onOpen: function (selectedDates, dateStr, instance) {
                console.log("Calendar opened");
            },
            onChange: function (selectedDates, dateStr, instance) {
                console.log("Date changed:", dateStr);
            },
        });

        // Thêm sự kiện click cho icon calendar
        const calendarIcon = birthdayInput.parentElement.querySelector("i");
        if (calendarIcon) {
            calendarIcon.addEventListener("click", function () {
                flatpickrInstance.open();
            });
        }
    }

    // Xử lý đổi mật khẩu
    const changePasswordBtn = document.querySelector(".change-password-btn");
    const passwordFields = document.getElementById("passwordFields");
    const changePasswordCheckbox = document.getElementById(
        "changePasswordCheckbox"
    );

    if (changePasswordBtn && passwordFields && changePasswordCheckbox) {
        // Đảm bảo form mật khẩu ẩn ban đầu
        passwordFields.style.display = "none";

        // Debug
        console.log("Found password elements:", {
            btn: changePasswordBtn,
            fields: passwordFields,
            checkbox: changePasswordCheckbox,
        });

        // Xử lý click vào nút đổi mật khẩu
        changePasswordBtn.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            console.log("Password button clicked");

            changePasswordCheckbox.checked = !changePasswordCheckbox.checked;
            passwordFields.style.display = changePasswordCheckbox.checked
                ? "block"
                : "none";
        });

        // Xử lý thay đổi checkbox
        changePasswordCheckbox.addEventListener("change", function () {
            console.log("Checkbox changed:", this.checked);
            passwordFields.style.display = this.checked ? "block" : "none";
        });
    } else {
        console.log("Missing elements:", {
            btn: !!changePasswordBtn,
            fields: !!passwordFields,
            checkbox: !!changePasswordCheckbox,
        });
    }

    // CSS cho animation
    const style = document.createElement("style");
    style.textContent = `
    .success-checkmark {
      width: 80px;
      height: 80px;
      margin: 0 auto;
      position: relative;
    }

    .check-icon {
      width: 80px;
      height: 80px;
      position: relative;
      border-radius: 50%;
      box-sizing: content-box;
      border: 4px solid #4CAF50;
      background: #fff;
    }

    .check-icon::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 35px;
      height: 20px;
      border-left: 4px solid #4CAF50;
      border-bottom: 4px solid #4CAF50;
      transform: translate(-50%, -65%) rotate(-45deg);
      opacity: 0;
      animation: check-draw 0.8s ease forwards;
      animation-delay: 0.4s;
    }

    @keyframes circle-fill {
      0% {
        transform: scale(0);
      }
      100% {
        transform: scale(1);
      }
    }

    @keyframes check-draw {
      0% {
        width: 0;
        opacity: 0;
      }
      100% {
        width: 35px;
        opacity: 1;
      }
    }
  `;
    document.head.appendChild(style);

    // Thêm CSS cho flatpickr
    const linkElement = document.createElement("link");
    linkElement.rel = "stylesheet";
    linkElement.href =
        "https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css";
    document.head.appendChild(linkElement);

    const form = document.querySelector('#enterprise-register-form');
    const saveBtn = document.querySelector('.save-btn');

    if(form && saveBtn) {
        saveBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            console.log('Button clicked'); // Debug

            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const result = await response.json();
                console.log('Response:', result); // Debug
                
                if(result.status === 'success') {
                    // Ẩn step3
                    const step3 = document.getElementById("step3");
                    if(step3) step3.style.display = "none";
                    
                    // Hiện step4
                    const step4 = document.getElementById("step4");
                    if(step4) step4.style.display = "block";
                    
                    // Cập nhật progress
                    updateProgress(4);
                } else {
                    alert(result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Đã có lỗi xảy ra');
            }
        });
    }
});
console.log("JavaScript hoạt động");
