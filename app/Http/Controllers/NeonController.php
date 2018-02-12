<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NeonController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

        public function charts()
    {
        return view('neon.charts');
    }
    public function dashboard2()
    {
        return view('neon.dashboard-2');
    }
    public function dashboard3()
    {
        return view('neon.dashboard-3');
    }
    public function extra404()
    {
        return view('neon.extra-404');
    }
    public function extraBlankPage()
    {
        return view('neon.extra-blank-page');
    }
    public function extraCalendar()
    {
        return view('neon.extra-calendar');
    }
    public function extraChatApi()
    {
        return view('neon.extra-chat-api');
    }
    public function extraComments()
    {
        return view('neon.extra-comments');
    }
    public function extraFileTree()
    {
        return view('neon.extra-file-tree');
    }
    public function extraForgotPassword()
    {
        return view('neon.extra-forgot-password');
    }
    public function extraGallerySingle()
    {
        return view('neon.extra-gallery-single');
    }
    public function extraGallery()
    {
        return view('neon.extra-gallery');
    }
    public function extraGoogleMaps()
    {
        return view('neon.extra-google-maps');
    }
    public function extraIconsEntypo()
    {
        return view('neon.extra-icons-entypo');
    }
    public function extraIconsGlyphicons()
    {
        return view('neon.extra-icons-glyphicons');
    }
    public function extraIcons()
    {
        return view('neon.extra-icons');
    }
    public function extraImageCrop()
    {
        return view('neon.extra-image-crop');
    }
    public function extraInvoice()
    {
        return view('neon.extra-invoice');
    }
    public function extraLanguageSelector()
    {
        return view('neon.extra-language-selector');
    }
    public function extraLoadProgress()
    {
        return view('neon.extra-load-progress');
    }
    public function extraLockscreen()
    {
        return view('neon.extra-lockscreen');
    }
    public function extraLogin()
    {
        return view('neon.extra-login');
    }
    public function extraMembers()
    {
        return view('neon.extra-members');
    }
    public function extraNestable()
    {
        return view('neon.extra-nestable');
    }
    public function extraNewPost()
    {
        return view('neon.extra-new-post');
    }
    public function extraNotes()
    {
        return view('neon.extra-notes');
    }
    public function extraPortlets()
    {
        return view('neon.extra-portlets');
    }
    public function extraProfile()
    {
        return view('neon.extra-profile');
    }
    public function extraRegister()
    {
        return view('neon.extra-register');
    }
    public function extraScrollbox()
    {
        return view('neon.extra-scrollbox');
    }
    public function extraSearch()
    {
        return view('neon.extra-search');
    }
    public function extraSettings()
    {
        return view('neon.extra-settings');
    }
    public function extraTimelineCentered()
    {
        return view('neon.extra-timeline-centered');
    }
    public function extraTimeline()
    {
        return view('neon.extra-timeline');
    }
    public function extraTocify()
    {
        return view('neon.extra-tocify');
    }
    public function extraVectorMaps()
    {
        return view('neon.extra-vector-maps');
    }
    public function formsAdvanced()
    {
        return view('neon.forms-advanced');
    }
    public function formsButtons()
    {
        return view('neon.forms-buttons');
    }
    public function formsFileUpload()
    {
        return view('neon.forms-file-upload');
    }
    public function formsIcheck()
    {
        return view('neon.forms-icheck');
    }
    public function formsMain()
    {
        return view('neon.forms-main');
    }
    public function formsMasks()
    {
        return view('neon.forms-masks');
    }
    public function formsSliders()
    {
        return view('neon.forms-sliders');
    }
    public function formsValidation()
    {
        return view('neon.forms-validation');
    }
    public function formsWizard()
    {
        return view('neon.forms-wizard');
    }
    public function formsWysiwyg()
    {
        return view('neon.forms-wysiwyg');
    }
    public function highlights()
    {
        return view('neon.highlights');
    }
    public function index()
    {
        return view('neon.index');
    }
    public function layoutApiRightSidebar()
    {
        return view('neon.layout-api-right-sidebar');
    }
    public function layoutApi()
    {
        return view('neon.layout-api');
    }
    public function layoutBothMenusRightSidebarCollapsed()
    {
        return view('neon.layout-both-menus-right-sidebar-collapsed');
    }
    public function layoutBothMenusRightSidebar()
    {
        return view('neon.layout-both-menus-right-sidebar');
    }
    public function layoutBoxed()
    {
        return view('neon.layout-boxed');
    }
    public function layoutChatOpen()
    {
        return view('neon.layout-chat-open');
    }
    public function layoutCollapsedSidebar()
    {
        return view('neon.layout-collapsed-sidebar');
    }
    public function layoutFixedSidebar()
    {
        return view('neon.layout-fixed-sidebar');
    }
    public function layoutHorizontalMenuBoxed()
    {
        return view('neon.layout-horizontal-menu-boxed');
    }
    public function layoutHorizontalMenuChat()
    {
        return view('neon.layout-horizontal-menu-chat');
    }
    public function layoutHorizontalMenuFluid()
    {
        return view('neon.layout-horizontal-menu-fluid');
    }
    public function layoutMixedMenusCollapsed()
    {
        return view('neon.layout-mixed-menus-collapsed');
    }
    public function layoutMixedMenusLogoFit()
    {
        return view('neon.layout-mixed-menus-logo-fit');
    }
    public function layoutMixedMenus()
    {
        return view('neon.layout-mixed-menus');
    }
    public function layoutPageTransitionFadeOnly()
    {
        return view('neon.layout-page-transition-fade-only');
    }
    public function layoutPageTransitionFade()
    {
        return view('neon.layout-page-transition-fade');
    }
    public function layoutPageTransitionLeftIn()
    {
        return view('neon.layout-page-transition-left-in');
    }
    public function layoutPageTransitionRightIn()
    {
        return view('neon.layout-page-transition-right-in');
    }
    public function layoutRightSidebarChat()
    {
        return view('neon.layout-right-sidebar-chat');
    }
    public function layoutRightSidebarCollapsed()
    {
        return view('neon.layout-right-sidebar-collapsed');
    }
    public function layoutRightSidebar()
    {
        return view('neon.layout-right-sidebar');
    }
    public function layoutSidebarChatOpen()
    {
        return view('neon.layout-sidebar-chat-open');
    }
    public function layoutSidebarStatic()
    {
        return view('neon.layout-sidebar-static');
    }
    public function mailboxCompose()
    {
        return view('neon.mailbox-compose');
    }
    public function mailboxMessage()
    {
        return view('neon.mailbox-message');
    }
    public function mailbox()
    {
        return view('neon.mailbox');
    }
    public function skinBlack()
    {
        return view('neon.skin-black');
    }
    public function skinBlue()
    {
        return view('neon.skin-blue');
    }
    public function skinCafe()
    {
        return view('neon.skin-cafe');
    }
    public function skinGreen()
    {
        return view('neon.skin-green');
    }
    public function skinPurple()
    {
        return view('neon.skin-purple');
    }
    public function skinRed()
    {
        return view('neon.skin-red');
    }
    public function skinWhite()
    {
        return view('neon.skin-white');
    }
    public function skinYellow()
    {
        return view('neon.skin-yellow');
    }
    public function tablesDatatable()
    {
        return view('neon.tables-datatable');
    }
    public function tablesMain()
    {
        return view('neon.tables-main');
    }
    public function uiAlerts()
    {
        return view('neon.ui-alerts');
    }
    public function uiBadgesLabels()
    {
        return view('neon.ui-badges-labels');
    }
    public function uiBlockquotes()
    {
        return view('neon.ui-blockquotes');
    }
    public function uiBreadcrumbs()
    {
        return view('neon.ui-breadcrumbs');
    }
    public function uiModals()
    {
        return view('neon.ui-modals');
    }
    public function uiNavbars()
    {
        return view('neon.ui-navbars');
    }
    public function uiNotifications()
    {
        return view('neon.ui-notifications');
    }
    public function uiPagination()
    {
        return view('neon.ui-pagination');
    }
    public function uiPanels()
    {
        return view('neon.ui-panels');
    }
    public function uiProgressBars()
    {
        return view('neon.ui-progress-bars');
    }
    public function uiTabsAccordions()
    {
        return view('neon.ui-tabs-accordions');
    }
    public function uiTiles()
    {
        return view('neon.ui-tiles');
    }
    public function uiTooltipsPopovers()
    {
        return view('neon.ui-tooltips-popovers');
    }
    public function uiTypography()
    {
        return view('neon.ui-typography');
    }

}
