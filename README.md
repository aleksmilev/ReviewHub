# ReviewHub - React Frontend

A modern React-based single-page application (SPA) for the ReviewHub company review platform. This frontend application provides a responsive user interface for browsing companies, leaving reviews, and managing content through an admin panel. Built with React, React Router, and Vite.

## Features

### User Features
- **Company Browsing**: View all companies with ratings and reviews in a responsive grid layout
- **Company Search**: Search companies by name or description with real-time results
- **Tag Filtering**: Filter companies by tags with color-coded badges
- **Review System**: Leave reviews with ratings (1-5 stars), titles, and detailed feedback
- **User Authentication**: Register, login, and manage your profile with secure token-based authentication
- **User Profiles**: View your own reviews and manage account settings
- **Anonymous Reviews**: Option to leave reviews without an account
- **Dynamic Page Titles**: Automatic page title updates based on current route

### Admin Features
- **Dashboard**: Overview with statistics and recent feedback
- **Company Management**: Create, edit, and delete companies with tag assignment
- **User Management**: Manage users, change roles, delete accounts (with self-protection)
- **Review Management**: View and moderate all reviews
- **Tag Management**: Create and manage tags with custom colors and descriptions
- **Route Protection**: Automatic redirect to login for unauthorized admin access

### Technical Features
- **Single Page Application**: Fast navigation without page reloads
- **Dynamic Routing**: URL-based component loading with React Router
- **API Integration**: RESTful API communication with token-based authentication
- **Responsive Design**: Mobile-friendly interface with modern CSS
- **Component-Based Architecture**: Reusable React components
- **State Management**: Component-level state management with React hooks and class components

## Tech Stack

- **Frontend Framework**: React 19.2.0
- **Build Tool**: Vite 7.3.1
- **Routing**: React Router DOM 7.13.1
- **Styling**: CSS Modules (organized in `src/style/`)
- **Development**: ESLint, Hot Module Replacement (HMR)
- **Backend API**: ReviewHub PHP API (separate repository)

## Project Structure

```
react/
├── public/              # Static assets
│   └── vite.svg
├── src/
│   ├── assets/         # React assets
│   │   └── react.svg
│   ├── components/     # React components
│   │   ├── common/     # Reusable components
│   │   │   ├── Form/   # Form component
│   │   │   ├── NotFound/ # 404 page component
│   │   │   └── Popup/  # Popup/modal component
│   │   ├── layout/     # Layout components
│   │   │   ├── header.jsx    # Site header with navigation
│   │   │   ├── footer.jsx    # Site footer
│   │   │   └── Layout.jsx    # Main layout wrapper
│   │   └── pages/      # Page components
│   │       ├── admin/  # Admin panel pages
│   │       │   ├── index.jsx      # Admin dashboard
│   │       │   ├── companies.jsx   # Company management
│   │       │   ├── company.jsx    # Create/Edit company
│   │       │   ├── reviews.jsx    # Review management
│   │       │   ├── tags.jsx       # Tag listing
│   │       │   ├── tag.jsx        # Create/Edit tag
│   │       │   └── users.jsx      # User management
│   │       ├── home/   # Homepage
│   │       │   └── index.jsx
│   │       ├── legal/  # Legal pages
│   │       │   ├── about.jsx
│   │       │   ├── contact.jsx
│   │       │   ├── privacy.jsx
│   │       │   └── terms.jsx
│   │       ├── review/ # Review-related pages
│   │       │   ├── company.jsx   # Company listing & detail
│   │       │   ├── index.jsx      # All reviews
│   │       │   └── search.jsx     # Search & filter
│   │       └── user/   # User-related pages
│   │           ├── login.jsx
│   │           ├── register.jsx
│   │           ├── profile.jsx
│   │           └── reviews.jsx
│   ├── routing/        # Routing logic
│   │   └── ActiveComponent.jsx  # Dynamic component loader
│   ├── services/       # Service modules
│   │   ├── api.js              # API request handler
│   │   ├── user.js             # User authentication service
│   │   ├── token.js            # Token management
│   │   ├── encryption.js       # Encryption utilities
│   │   └── withRouter.jsx      # Router HOC
│   ├── style/          # Stylesheets
│   │   ├── admin.css      # Admin panel styles
│   │   ├── auth.css       # Authentication pages
│   │   ├── company.css    # Company pages
│   │   ├── contact.css    # Contact form
│   │   ├── footer.css     # Footer styles
│   │   ├── Form.css       # Form components
│   │   ├── header.css     # Header styles
│   │   ├── home.css       # Homepage styles
│   │   ├── layout.css     # Layout styles
│   │   ├── legal.css      # Legal pages
│   │   ├── NotFound.css   # 404 page
│   │   ├── Popup.css      # Popup/modal
│   │   ├── profile.css    # User profile
│   │   └── reviews.css    # Review pages
│   ├── apiSchematic.json # API endpoint definitions
│   ├── App.jsx          # Root component
│   ├── main.jsx         # Application entry point
│   └── index.css        # Global styles
├── index.html           # HTML template
├── package.json         # Dependencies and scripts
├── vite.config.js       # Vite configuration
└── README.md            # This file
```

## Architecture

### Component-Based Architecture

The application uses React class components and functional components organized by feature:

- **Layout Components**: Header, Footer, and main Layout wrapper
- **Page Components**: Route-specific components in `pages/` directory
- **Common Components**: Reusable components (Form, NotFound, Popup)
- **Service Layer**: API communication, authentication, and utilities

### Routing System

The application uses a custom dynamic routing system:

- **ActiveComponent**: Dynamically loads components based on URL path
- **Path Parsing**: Converts URLs to `directory/view` format
- **Route Protection**: Admin routes automatically redirect non-admin users
- **Dynamic Titles**: Page titles update automatically based on route

### API Integration

- **ApiRequest Service**: Centralized API communication handler
- **Token Management**: Automatic token inclusion in authenticated requests
- **Error Handling**: Consistent error handling across API calls
- **API Schema**: Endpoint definitions in `apiSchematic.json`

### State Management

- **Component State**: Uses React `this.state` and `setState` for class components
- **Local Storage**: User authentication tokens and user data
- **Service Layer**: UserService for authentication state management

## Installation

### Prerequisites

- Node.js 18+ and npm (or yarn)
- ReviewHub PHP API backend running (see [ReviewHub repository](https://github.com/aleksmilev/ReviewHub))

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd react
   ```

2. **Install dependencies**
   ```bash
   npm install
   ```

3. **Configure API endpoint**
   
   Update the API base URL in `src/services/api.js` if your backend is not running on `http://localhost:8080`:
   ```javascript
   const baseUrl = 'http://localhost:8080/api'
   ```

4. **Start the development server**
   ```bash
   npm run dev
   ```

5. **Access the application**
   
   Open your browser to the URL shown in the terminal (typically `http://localhost:5173`)

### Build for Production

```bash
npm run build
```

The production build will be in the `dist/` directory. Serve it with any static file server:

```bash
npm run preview
```

## Configuration

### API Configuration

The API endpoint configuration is in `src/services/api.js`. Update the `baseUrl` constant to point to your backend:

```javascript
const baseUrl = 'http://your-api-domain.com/api'
```

### API Schema

API endpoint definitions are stored in `src/apiSchematic.json`. This file defines:
- Available endpoints
- Required HTTP methods
- Required parameters for each endpoint

## Usage

### For Regular Users

1. **Browse Companies**: Navigate to `/review/company` to see all companies
2. **Search**: Use the search bar in the header to find companies
3. **Filter by Tags**: Click on tags to filter companies
4. **Leave Reviews**: Click on a company to view details and leave a review
5. **Create Account**: Register at `/user/register` to track your reviews
6. **Manage Profile**: Access your profile at `/user/profile` (requires login)

### For Administrators

1. **Access Admin Panel**: Navigate to `/admin` (requires admin role)
2. **Manage Companies**: Create, edit, or delete companies at `/admin/companies`
3. **Manage Users**: View and manage users at `/admin/users`
4. **Manage Reviews**: View and delete reviews at `/admin/reviews`
5. **Manage Tags**: Create and manage tags at `/admin/tags`
6. **View Dashboard**: See statistics and recent feedback at `/admin`

## URL Structure

- `/home` - Homepage
- `/review` - All reviews
- `/review/company` - All companies
- `/review/company/{id}` - Single company with reviews
- `/review/search` - Search companies
- `/review/search?query={query}` - Search by query
- `/review/search?tag={id}` - Filter by tag
- `/user/login` - Login page
- `/user/register` - Registration page
- `/user/profile` - User profile (requires login)
- `/user/reviews` - User's reviews (requires login)
- `/admin` - Admin dashboard (requires admin role)
- `/admin/companies` - Manage companies
- `/admin/company/create` - Create company
- `/admin/company/edit/{id}` - Edit company
- `/admin/users` - Manage users
- `/admin/reviews` - Manage reviews
- `/admin/tags` - Manage tags
- `/admin/tag/create` - Create tag
- `/admin/tag/edit/{id}` - Edit tag
- `/legal/terms` - Terms of Service
- `/legal/privacy` - Privacy Policy
- `/legal/about` - About page
- `/legal/contact` - Contact page

## API Integration

This frontend communicates with the ReviewHub PHP API backend. All API requests are handled through the `ApiRequest` service in `src/services/api.js`.

### Authentication

The application uses token-based authentication:

1. User logs in via `/api/user/login`
2. Token is stored in localStorage
3. Token is automatically included in subsequent API requests
4. Token is validated on each request

### API Endpoints Used

The application uses the following API endpoints (defined in `apiSchematic.json`):

#### User API
- `POST /api/user/login` - User authentication
- `POST /api/user/register` - User registration
- `GET /api/user/user` - Get current user
- `GET /api/user/reviews` - Get user's reviews
- `POST /api/user/changePassword` - Change password
- `POST /api/user/changeEmail` - Change email
- `GET /api/user/getAllUsers` - Get all users (admin)
- `POST /api/user/changeUserRole` - Change user role (admin)
- `POST /api/user/deleteUser` - Delete user (admin)

#### Review API
- `GET /api/review/listCompany` - Get all companies
- `POST /api/review/getCompany` - Get company details
- `GET /api/review/getReview` - Get all reviews
- `POST /api/review/postReview` - Create review
- `GET /api/review/getTags` - Get all tags
- `POST /api/review/searchByCompany` - Search companies
- `POST /api/review/searchByTag` - Filter by tag
- `POST /api/review/deleteReview` - Delete review (admin)
- `POST /api/review/createCompany` - Create company (admin)
- `POST /api/review/updateCompany` - Update company (admin)
- `POST /api/review/deleteCompany` - Delete company (admin)
- `POST /api/review/createTag` - Create tag (admin)
- `POST /api/review/updateTag` - Update tag (admin)
- `POST /api/review/deleteTag` - Delete tag (admin)

#### Legal API
- `POST /api/legal/form` - Submit contact form
- `GET /api/legal/list` - Get all feedback (admin)

## Development

### Available Scripts

- `npm run dev` - Start development server with HMR
- `npm run build` - Build for production
- `npm run preview` - Preview production build
- `npm run lint` - Run ESLint

### Code Organization

- **Components**: Organized by feature in `src/components/pages/`
- **Services**: Business logic and API calls in `src/services/`
- **Styles**: Modular CSS files in `src/style/`
- **Routing**: Dynamic routing in `src/routing/ActiveComponent.jsx`

### Adding New Pages

1. Create component in appropriate `src/components/pages/{directory}/{view}.jsx`
2. Component will be automatically loaded based on URL path
3. Add styles to appropriate CSS file in `src/style/`
4. Update `ActiveComponent.jsx` title mapping if needed

### Styling

- CSS files are organized by feature in `src/style/`
- Import styles in component files: `import '../../style/feature.css'`
- Follow existing naming conventions (BEM-like classes)

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Dependencies

### Production Dependencies
- `react` ^19.2.0 - React library
- `react-dom` ^19.2.0 - React DOM rendering
- `react-router-dom` ^7.13.1 - Client-side routing

### Development Dependencies
- `vite` ^7.3.1 - Build tool and dev server
- `@vitejs/plugin-react` ^5.1.1 - Vite React plugin
- `eslint` ^9.39.1 - Code linting
- `@types/react` ^19.2.7 - TypeScript types for React

## Contributing

1. Follow existing code style and component structure
2. Use class components for complex state management
3. Keep components focused and reusable
4. Add appropriate error handling
5. Update API schema if adding new endpoints

## License

This project is part of the ReviewHub platform.

## Acknowledgments

- Built with React and Vite
- Uses React Router for client-side routing
- Integrates with ReviewHub PHP API backend
- Modern CSS for responsive design
