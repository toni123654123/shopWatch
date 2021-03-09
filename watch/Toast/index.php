<style>
    /* Modifier */
    .btn--size-l {
        padding: 16px 56px;
    }

    .btn--size-s {
        padding: 8px 32px;
    }

    .btn:hover {
        opacity: 0.8;
    }

    .btn+.btn {
        margin-left: 16px;
    }

    .btn--success {
        background-color: #71be34;
    }

    .btn--warn {
        background-color: #ffb702;
    }

    .btn--danger {
        background-color: #ff623d;
    }

    .btn--disabled {
        opacity: 0.5 !important;
        cursor: default;
    }

    /* ======= Toast message ======== */

    #toast {
        position: fixed;
        top: 32px;
        right: 32px;
        z-index: 999999;
    }

    .toast {
        display: flex;
        align-items: center;
        background-color: #fff;
        border-radius: 2px;
        padding: none;
        min-width: 400px;
        max-width: 450px;
        border-left: 4px solid;
        box-shadow: 0 5px 8px rgba(0, 0, 0, 0.08);
        transition: all linear 0.3s;
        font-family: "Helvetica Neue";
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(calc(100% + 32px));
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeOut {
        to {
            opacity: 0;
        }
    }

    .toast--success {
        border-color: #47d864;
    }

    .toast--success .toast__icon {
        color: #47d864;
    }

    .toast--info {
        border-color: #2f86eb;
    }

    .toast--info .toast__icon {
        color: #2f86eb;
    }

    .toast--warning {
        border-color: #ffc021;
    }

    .toast--warning .toast__icon {
        color: #ffc021;
    }

    .toast--error {
        border-color: #ff623d;
    }

    .toast--error .toast__icon {
        color: #ff623d;
    }

    .toast+.toast {
        margin-top: 24px;
    }

    .toast__icon {
        font-size: 24px;
    }

    .toast__icon,
    .toast__close {
        padding: 0 16px;
    }

    .toast__body {
        flex-grow: 1;
    }

    .toast__title {
        font-size: 16px;
        font-weight: 600;
        color: #333;
    }

    .toast__msg {
        font-size: 14px;
        color: #888;
        margin-top: 6px;
        line-height: 1.5;
    }

    .toast__close {
        font-size: 20px;
        color: rgba(0, 0, 0, 0.3);
        cursor: pointer;
    }

    @media screen and (max-width: 768px) {
        .toast {
            min-width: 290px;
            max-width: 350px;
        }

    }
</style>

<div id="toast"></div>

<script>
    // Toast function
    function toast({
        title = "",
        message = "",
        type = "info",
        duration = 300000000000
    }) {
        const main = document.getElementById("toast");
        if (main) {
            const toast = document.createElement("div");

            // Auto remove toast
            const autoRemoveId = setTimeout(function() {
                main.removeChild(toast);
            }, duration + 1000);

            // Remove toast when clicked
            toast.onclick = function(e) {
                if (e.target.closest(".toast__close")) {
                    main.removeChild(toast);
                    clearTimeout(autoRemoveId);
                }
            };

            const icons = {
                success: "fa fa-check-circle",
                info: "fa fa-info-circle",
                warning: "fa fa-exclamation-circle",
                error: "fa fa-exclamation-circle"
            };
            const icon = icons[type];
            const delay = (duration / 1000).toFixed(2);

            toast.classList.add("toast", `toast--${type}`);
            toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${duration}s forwards`;

            toast.innerHTML = `
                    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__title">${title}</h3>
                        <p class="toast__msg">${message}</p>
                    </div>
                    <div class="toast__close">
                        <i class="fa fa-times"></i>
                    </div>
                `;
            main.appendChild(toast);
        }
    }
</script>