/*
 * @license
 * CRUD, PWA and Synchronization tested
 * Copyright 2020 optima solution.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License
 */
'use strict';

// Update cache names any time any of the cached files change.
const CACHE_NAME = 'static-cache-v1';
const DATA_CACHE_NAME = 'data-cache-v2';

// Add list of files to cache here.
const FILES_TO_CACHE = [
    '/',
    'content/js/init.js',
    'content/js/install.js',
    'content/js/materialize.js',
    'content/css/style.css',
    'content/css/materialize.min.css',
    'content/css/materialize.css',
    'content/img/favicon.ico',
    'offline.html',
];

self.addEventListener('install', (evt) => {
  console.log('[ServiceWorker] Install');
  // Precache static resources here.
  evt.waitUntil(
      caches.open(CACHE_NAME).then((cache) => {
        console.log('[ServiceWorker] Pre-caching offline page');
        return cache.addAll(FILES_TO_CACHE);
      })
  );

  self.skipWaiting();
});

self.addEventListener('activate', (evt) => {
  console.log('[ServiceWorker] Activate');
  // Remove previous cached data from disk.
      evt.waitUntil(
        caches.keys().then((keyList) => {
          return Promise.all(keyList.map((key) => {
            if (key !== CACHE_NAME && key !== DATA_CACHE_NAME) {
              console.log('[ServiceWorker] Removing old cache', key);
              return caches.delete(key);
            }
          }));
        })
    );

  self.clients.claim();
});


self.addEventListener('fetch', (event) => {
  // Do not cache read.php dynamically. Network first for read.php and then save into cache with the updated version.
    if(event.request.url.includes('read.php')){
        // console.log('for read page only');
        event.respondWith(
            fetch(event.request).then(fetchRes=>{
                console.log('fetch from network',event.request.url);
                let fetchResClone = fetchRes.clone();
                caches.open(DATA_CACHE_NAME).then((cache) => {
                    // console.log('delete cache:',event.request.url);
                    cache.delete(event.request.url,fetchResClone).then((fetchResCache)=>{
                    // console.log('caching ', event.request.url);
                    cache.put(event.request.url, fetchResClone);
                    })
                })
                return fetchRes;
            }).catch(function() {
                //   console.log('fetch from cache',event.request.url);
                  return caches.match(event.request);
                })
        )
        return;
    }
    //for page other than read.php
    else{
        //   console.log('for other page');
          event.respondWith(
            caches.match(event.request).then((resp) => {
                console.log('fetch handling for other pages');
              return resp || fetch(event.request).then((response) => {
                let responseClone = response.clone();
                caches.open(DATA_CACHE_NAME).then((cache) => {
                  console.log('fetch even handling:',event.request,responseClone.url);
                  cache.put(event.request, responseClone);
                });

                return response;
              });
            }).catch(() => {
                // console.log('requested url not found', event.request.url);
                return caches.match('offline.html');
            })
          );
    }
 });
