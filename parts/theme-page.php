<?php
$product_id = $_SESSION['Product_ID'];
// echo ($product_id);
// die;
switch ($product_id) {
    case 7:
        ?>
         <style>
    .custom-after-tabs .th-btn.custom-after {
        padding: 20px !important;
    }

    .th-btn.style2:hover:before,
    .th-btn.style2:hover:after {
        background-color: var(--title-color) !important;
    }

    .custom-after-tabs .th-btn.custom-after {
        /* background: var(--title-color) !important; */
        color: var(--title-color) !important;
        border: 1px solid var(--title-color) !important;
        padding: 8px 20px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .custom-after-tabs .th-btn.custom-after:hover {
        background: var(--title-color) !important;
        color: #fff !important;
        /* border-color: var(--title-color) !important; */
    }

    .custom-after-tabs .th-btn.custom-after.active {
        background: var(--theme-color) !important;
        color: #fff !important;
        /* border-color: var(--theme-color) !important; */
    }

    .custom-after-tabs .th-btn.custom-after.active:hover {
        background: var(--theme-color) !important;
        color: #fff !important;
    }

    .custom-after-tabs {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        overflow-x: auto !important;
        overflow-y: hidden !important;
        justify-content: flex-start !important;
        gap: 8px;
        max-width: 100%;
        -webkit-overflow-scrolling: touch;
    }

    .custom-after-tabs .th-btn {
        flex: 0 0 auto !important;
        white-space: nowrap !important;
        color: black;

    }


    /* ===== BEFORE AFTER TABS ===== */
    .custom-after-tabs-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .custom-after-tabs-wrapper::-webkit-scrollbar {
        display: none;
    }

    .custom-after-tabs {
        display: flex;
        flex-wrap: nowrap;
        gap: 8px;
        width: max-content;
        min-width: 100%;
        justify-content: center;
        /* padding: 4px 2px; */
    }

    .custom-after-tabs .th-btn.custom-after {
        flex-shrink: 0;
        white-space: nowrap;
        background: transparent !important;
        color: var(--title-color) !important;
        /* border: 1px solid var(--title-color) !important; */
        /* padding: 8px 20px !important; */
        font-size: 14px;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .custom-after-tabs .th-btn.custom-after.active {
        background: var(--theme-color) !important;
        color: #fff !important;
        /* border-color: var(--theme-color) !important; */
    }

    /* Smooth image transition on tab switch */
    #baAfter,
    #baBeforeImg {
        transition: opacity 0.3s ease;
    }
</style>
        <?php
        break;

    case 6:
        ?>
        <style>
    .home-electrician {
        --theme-color: #F47629 !important;
    }

    :root {
        --title-color: black !important;
    }

    /* other css */
    .form-group>i {
        color: var(--title-color) !important;
        background: #F47629 !important;
    }

    .contact-form2 .form-control,
    .contact-form2 .form-select {
        border-color: black !important;
    }

    .contact-form2 input::placeholder,
    .contact-form2 select option[value=""][disabled],
    .contact-form2 select:valid,
    .contact-form2 textarea::placeholder {
        color: #c2c2c2ff !important;
    }

    .service-card {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .service-card .box-img img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .service-card:hover .box-img img {
        transform: scale(1.05);
    }

    .service-card .box-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .service-card .box-title a {
        color: white;
        text-decoration: none;
        font-size: 1.1rem;
        margin: 0;
    }

    .service-card .icon-btn {
        background: var(--theme-color, #f4b41a);
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: white;
        transition: all 0.3s ease;
    }

    .service-card .icon-btn:hover {
        background: white;
        color: var(--theme-color, #f4b41a);
    }

    @media (max-width: 768px) {
        .service-card .box-img img {
            height: 200px;
        }

        .service-card .box-title a {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .service-card .box-img img {
            height: 180px;
        }
    }
</style>
        <?php
        break;

    case 9:
        ?>
        <style>
    .home-electrician {
        --theme-color: #127a3a !important;
    }

    :root {
        --title-color: black !important;
    }

    /* other css */
    .form-group>i {
        color: var(--title-color) !important;
        background: #127a3a !important;
    }

    .contact-form2 .form-control,
    .contact-form2 .form-select {
        border-color: black !important;
    }

    .contact-form2 input::placeholder,
    .contact-form2 select option[value=""][disabled],
    .contact-form2 select:valid,
    .contact-form2 textarea::placeholder {
        color: #c2c2c2ff !important;
    }

    .contact-process .box-number,
    .process-item_icon .number {

        background-color: rgb(41 244 120 / 20%);
    }

    .lord-krishna {
        background-color: #000000 !important;
    }

    .accordion-card.style3 {
        background: #127a3a;
    }
</style> 
        <?php
        break;

    default:
        // Default styles if needed
        break;
}
?>