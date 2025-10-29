# 🚀 Project Description

> Project ini contoh implementasi websocket dengan menggunakan laravel Reverb, untuk melihat realtime data yang saya tampilkan dalam bentuk datatable.

> Saya membuat 2 halaman:
> Halaman Student Data: menampilkan data mahasiswa dalam bentuk table yang saya buat dengan datatable yajra. table ini akan otomatis update tanpa harus melakukan refresh halaman ketika terjadi perubahan data. saya menambahkan listener pada halaman ini, ketika event terjadi akan otomatis update data table.

> Halaman Student Form: halaman ini hanya menampilkan form untuk menghapus data sekaligus untuk menguji trigger event.

---

## ⚙️ Tech Stack

-   **Framework:** Laravel 12.35.1

---

## 🧩 Reverb installation & configuration

1. **Install Reverb**

```bash
php artisan install:broadcasting --reverb
```

2. **.env Configuration**

```
BROADCAST_DRIVER=reverb
BROADCAST_CONNECTION=reverb

REVERB_APP_ID=localapp
REVERB_APP_KEY=localkey
REVERB_APP_SECRET=localsecret

REVERB_HOST=127.0.0.1
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="127.0.0.1"
VITE_REVERB_PORT="8080"
VITE_REVERB_SCHEME="http"
```

3. **echo.js File**
   echo.js file is created automatically when you install reverb, no configuration is required in the file.

```
import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});
```

4. **Call 'resources/js/app.js' in blade**

```bash
@vite('resources/js/app.js')
```

5. **Create event**

```bash
php artisan make:event YourEventName
```

**Edit Event:**

-   **implement ShouldBroadcast ini your event**

```bash
class YourEventName implements ShouldBroadcast
```

**adjust your public channel name**

```
public function broadcastOn(): array
{
    return [
        new Channel('your-event')
    ];
}
```

6. **create Javascript Listener, to listen channel and event**

```
document.addEventListener('DOMContentLoaded', () => {
    window.Echo.channel('your-event')
        .listen('YourEventName', (e) => {
            console.log(e);
            //write the code you want when the event is called
        });
});
```

7. **Triggering Event**
    - **call an event every time you make a change to data or anything else:**

```bash
event(new YourEventName());
```

---

## ▶️ Run Program

-   **open some terminal to run the commands below:**

```bash
npm run dev
```

```bash
php artisan reverb:start
```

```bash
php artisan queue:work
```

```bash
php artisan serve
```
