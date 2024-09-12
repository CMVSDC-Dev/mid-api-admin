<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import HeaderArea from '@/Components/Header/HeaderArea.vue'
import SidebarArea from '@/Components/Sidebar/SidebarArea.vue'

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
  <!-- ===== Page Wrapper Start ===== -->
  <div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    <SidebarArea />
    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
      <!-- ===== Header Start ===== -->
      <HeaderArea />
      <!-- ===== Header End ===== -->

      <!-- ===== Main Content Start ===== -->
      <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
          <slot></slot>
        </div>
      </main>
      <!-- ===== Main Content End ===== -->

      <footer class="mt-auto bg-white text-gray-600 dark:bg-boxdark dark:text-gray-200 py-4 px-10">
        <div class="container mx-auto flex justify-between">
            <div class="w-1/2">
                <p>&copy; {{ new Date().getFullYear() }} Copyright: <strong><a href="#">{{ $page.props.appName }}</a>.</strong> All rights reserved.</p>
            </div>
            <div class="w-1/2">
                <p class="float-right"><b>Version</b> {{ $page.props.appVersion }}</p>
            </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- ===== Page Wrapper End ===== -->
</template>
