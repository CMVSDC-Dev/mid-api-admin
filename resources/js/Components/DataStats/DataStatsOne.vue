<script setup lang="ts">
import { ref } from 'vue'

const cardItems = ref([
  {
    icon: `<svg
            class="fill-primary"
            width="22"
            height="22"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M2 2h14v4h6v16H2V2zm18 6h-4v2h2v2h-2v2h2v2h-2v2h2v2h2V8zm-6-4H4v16h2v-2h6v2h2V4zM6 6h2v2H6V6zm6 0h-2v2h2V6zm-6 4h2v2H6v-2zm6 0h-2v2h2v-2zm-6 4h2v2H6v-2zm6 0h-2v2h2v-2z"
            />
          </svg>`,
    title: 'Total Companies',
    total: '51',
    color: 'bg-primary',
    growthRate: 0.43
  },
  {
    icon: `<svg
            class="fill-success"
            width="24"
            height="20"
            viewBox="0 0 20 18"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M7.18418 8.03751C9.31543 8.03751 11.0686 6.35313 11.0686 4.25626C11.0686 2.15938 9.31543 0.475006 7.18418 0.475006C5.05293 0.475006 3.2998 2.15938 3.2998 4.25626C3.2998 6.35313 5.05293 8.03751 7.18418 8.03751ZM7.18418 2.05626C8.45605 2.05626 9.52168 3.05313 9.52168 4.29063C9.52168 5.52813 8.49043 6.52501 7.18418 6.52501C5.87793 6.52501 4.84668 5.52813 4.84668 4.29063C4.84668 3.05313 5.9123 2.05626 7.18418 2.05626Z"
              fill=""
            />
            <path
              d="M15.8124 9.6875C17.6687 9.6875 19.1468 8.24375 19.1468 6.42188C19.1468 4.6 17.6343 3.15625 15.8124 3.15625C13.9905 3.15625 12.478 4.6 12.478 6.42188C12.478 8.24375 13.9905 9.6875 15.8124 9.6875ZM15.8124 4.7375C16.8093 4.7375 17.5999 5.49375 17.5999 6.45625C17.5999 7.41875 16.8093 8.175 15.8124 8.175C14.8155 8.175 14.0249 7.41875 14.0249 6.45625C14.0249 5.49375 14.8155 4.7375 15.8124 4.7375Z"
              fill=""
            />
            <path
              d="M15.9843 10.0313H15.6749C14.6437 10.0313 13.6468 10.3406 12.7874 10.8563C11.8593 9.61876 10.3812 8.79376 8.73115 8.79376H5.67178C2.85303 8.82814 0.618652 11.0625 0.618652 13.8469V16.3219C0.618652 16.975 1.13428 17.4906 1.7874 17.4906H20.2468C20.8999 17.4906 21.4499 16.9406 21.4499 16.2875V15.4625C21.4155 12.4719 18.9749 10.0313 15.9843 10.0313ZM2.16553 15.9438V13.8469C2.16553 11.9219 3.74678 10.3406 5.67178 10.3406H8.73115C10.6562 10.3406 12.2374 11.9219 12.2374 13.8469V15.9438H2.16553V15.9438ZM19.8687 15.9438H13.7499V13.8469C13.7499 13.2969 13.6468 12.7469 13.4749 12.2313C14.0937 11.7844 14.8499 11.5781 15.6405 11.5781H15.9499C18.0812 11.5781 19.8343 13.3313 19.8343 15.4625V15.9438H19.8687Z"
              fill=""
            />
          </svg>`,
    title: 'Total Members',
    total: '1,650',
    color: 'bg-success',
    growthRate: 4.35
  },
  {
    icon: `<svg
            class="fill-warning"
            width="22"
            height="22"
            viewBox="0 0 32 32"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M0 26.016q0 2.496 1.76 4.224t4.256 1.76h4v-4h-4q-0.832 0-1.44-0.576t-0.576-1.408v-14.016h24v14.016q0 0.832-0.576 1.408t-1.408 0.576h-4v4h4q2.464 0 4.224-1.76t1.76-4.224v-20q0-2.496-1.76-4.256t-4.224-1.76h-20q-2.496 0-4.256 1.76t-1.76 4.256v20zM4 10.016v-4q0-0.832 0.576-1.408t1.44-0.608h20q0.8 0 1.408 0.608t0.576 1.408v4h-24zM6.016 8h1.984v-1.984h-1.984v1.984zM10.016 24h4v8h4v-8h4l-6.016-8zM10.016 8h1.984v-1.984h-1.984v1.984zM14.016 8h12v-1.984h-12v1.984z"
            />
          </svg>`,
    title: 'Total Uploads',
    total: '24,503',
    color: 'bg-warning',
    growthRate: 2.59
  },
  {
    icon: `<svg
            class="fill-danger"
            width="22"
            height="22"
            viewBox="0 0 32 32"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M0 26.016q0 2.496 1.76 4.224t4.256 1.76h4.992l-2.496-4h-2.496q-0.832 0-1.44-0.576t-0.576-1.408v-14.016h24v14.016q0 0.832-0.576 1.408t-1.408 0.576h-2.528l-2.496 4h5.024q2.464 0 4.224-1.76t1.76-4.224v-20q0-2.496-1.76-4.256t-4.224-1.76h-20q-2.496 0-4.256 1.76t-1.76 4.256v20zM4 10.016v-4q0-0.832 0.576-1.408t1.44-0.608h20q0.8 0 1.408 0.608t0.576 1.408v4h-24zM6.016 8h1.984v-1.984h-1.984v1.984zM10.016 24l5.984 8 6.016-8h-4v-8h-4v8h-4zM10.016 8h1.984v-1.984h-1.984v1.984zM14.016 8h12v-1.984h-12v1.984z"
            />
          </svg>`,
    title: 'Total Downloads',
    total: '993,3876',
    color: 'bg-danger',
    growthRate: -0.95
  }
])
</script>

<template>
  <!-- Card Item Start -->
  <div
    v-for="(item, index) in cardItems"
    :key="index"
    :class="item.color"
    class="rounded-lg border border-stroke py-6 px-7.5 shadow-default dark:border-strokedark"
  >
    <div
      class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4"
      v-html="item.icon"
    ></div>

    <div class="mt-4 flex items-end justify-between">
      <div>
        <h4 class="text-title-md font-bold text-white">{{ item.total }}</h4>
        <span class="text-sm font-medium text-gray-100">{{ item.title }}</span>
      </div>

      <span class="flex items-center gap-1 text-sm font-medium text-gray-200">
        <Link href="/">More info...</Link>
      </span>
    </div>
  </div>
  <!-- Card Item End -->
</template>
