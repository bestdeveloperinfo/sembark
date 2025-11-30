# Sembark - Role Based URL Shortener (Laravel + MySQL)

This is a **Role-Based URL Shortener System** built in **Laravel 10** with  
5 types of user roles and complete access control, exactly as required in the assignment.

Frontend is built using simple **HTML + CSS + JavaScript (Fetch API)**.

---

# 🔑 Demo Login Credentials

Testing के लिए default user already मौजूद है:

### **Email**
test@test.com
### **Password**
123456



**This user belongs to company_id = 1**

---

# 👥 Roles & Permissions

| Role         | Create URL | View URLs | Special Rules |
|--------------|------------|-----------|----------------|
| **SuperAdmin** | ❌ No | ❌ No | Cannot view or create any URLs |
| **Admin**      | ❌ No | ✔ Yes (other companies only) | Cannot see URLs of own company |
| **Member**     | ❌ No | ✔ Yes (others only) | Cannot see own created URLs |
| **Sales**      | ✔ Yes | ✔ Yes | Full Access |
| **Manager**    | ✔ Yes | ✔ Yes | Same as Sales |

---

# 🏢 Company Based Filtering

हर user किसी न किसी company से जुड़ा है।  
जब URL बनता है:

- `company_id = user's company`
- `created_by = user_id`

Admin → अपनी company के users के URLs नहीं देख सकता  
Member → अपने खुद के बनाए URLs नहीं देख सकता  
Sales/Manager → सब कुछ देख सकते हैं  
SuperAdmin → कुछ भी नहीं देख सकता

---

# 🚀 Features

✔ Laravel Sanctum Authentication  
✔ Role-Based Access  
✔ Short URL Create  
✔ Short URL Listing  
✔ URL Redirection by Slug  
✔ Company-wise conditions  
✔ Frontend + Backend integration  
✔ Clean API design  
✔ Ready for Production

---

# 📡 API Endpoints

## 🔐 Authentication

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/login` | Login and get token |
| GET  | `/api/me` | Get logged-in user |
| POST | `/api/logout` | Logout |

---

## 🔗 Short URL APIs

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/short-urls` | List URLs (role-based filtered) |
| POST | `/api/short-urls` | Create short URL |
| GET | `/api/short-urls/{slug}/resolve` | Redirect / resolve |

---

# ⚙️ Installation (Laravel Backend)

### 1️⃣ Clone Project

https://github.com/bestdeveloperinfo/sembark.git

Backend runs on: http://127.0.0.1:8000

Run using Live Server OR: http://127.0.0.1:5500



---

# 🏁 Final Result

✔ All 5 roles completed  
✔ Full backend + frontend integration  
✔ All permission rules working  
✔ API tested  
✔ Assignment fully completed  

---

# 👨‍💻 Developer

**Aadil (bestdeveloperinfo)**  
Laravel Developer  