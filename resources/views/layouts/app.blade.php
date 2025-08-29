<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Admin Dashboard | E-Site')</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;400&display=swap" rel="stylesheet" />
  <style> body { display: flex; min-height: 100vh; margin: 0; font-family: 'Montserrat', sans-serif; background: #f4f6fb; }
    .sidebar { width: 220px; background: #222; color: #fff; display: flex; flex-direction: column; padding: 2rem 1rem; }
    .sidebar h2 { color: #4f8cff; margin-bottom: 2rem; font-size: 1.5rem; }
    .sidebar nav { flex: 1; }
    .sidebar nav a { display: block; color: #fff; text-decoration: none; padding: 1rem 0.5rem; border-radius: 4px; margin-bottom: 0.5rem; transition: background 0.2s; }
    .sidebar nav a.active, .sidebar nav a:hover { background: #4f8cff; color: #fff; }
    .sidebar .logout-btn { background: #ff6f91; color: #fff; border: none; padding: 0.75rem; border-radius: 4px; cursor: pointer; margin-top: 2rem; font-size: 1rem; }
    .dashboard-main { flex: 1; padding: 2rem; }
    .dashboard-section { display: none; }
    .dashboard-section.active { display: block; }
    .section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; }
    .section-header h1 { margin: 0; font-size: 2rem; }
    .add-btn { background: #4f8cff; color: #fff; border: none; padding: 0.5rem 1.2rem; border-radius: 4px; cursor: pointer; font-size: 1rem; }
    table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
    th, td { padding: 0.75rem 1rem; border-bottom: 1px solid #eee; text-align: left; }
    th { background: #f4f6fb; }
    tr:last-child td { border-bottom: none; }
    .action-btn { background: #ff6f91; color: #fff; border: none; padding: 0.3rem 0.8rem; border-radius: 4px; cursor: pointer; margin-right: 0.5rem; font-size: 0.95rem; }
    .edit-btn { background: #4f8cff; }
    .modal { display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100vw; height: 100vh; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; }
    .modal-content { background: #fff; padding: 2rem; border-radius: 8px; min-width: 320px; max-width: 95vw; position: relative; }
    .modal .close { position: absolute; top: 1rem; right: 1rem; font-size: 1.5rem; cursor: pointer; }
    .modal label { display: block; margin-bottom: 1rem; }
    .modal input, .modal textarea { width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc; margin-top: 0.3rem; }
    .modal button[type="submit"] { background: #4f8cff; color: #fff; border: none; padding: 0.5rem 1.2rem; border-radius: 4px; cursor: pointer; font-size: 1rem; }
    @media (max-width: 700px) { .sidebar { display: none; } .dashboard-main { padding: 1rem; } }</style>
</head>
<body>
  <x-sidebar />
  
  <main class="dashboard-main">
    <x-navbar />
    
    @yield('content')

    <x-footer />
  </main>
</body>
</html>
