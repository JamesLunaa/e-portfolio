# EFMS Static HTML - Employee File Management System

This is a static HTML conversion of the EFMS Laravel + Vue 3 application into pure HTML, CSS, and JavaScript.

## Project Structure

```
EFMS-static/
├── index.html                 # Welcome/Home page
├── dashboard.html            # Dashboard with employee overview
├── employees.html            # Employee management page
├── files.html                # File management page
├── deleted-employees.html    # Deleted employees restore page
├── deleted-files.html        # Deleted files restore page
├── settings.html             # Application settings
├── assets/
│   ├── css/
│   │   ├── styles.css        # Global styles and theme variables
│   │   └── dashboard.css     # Dashboard-specific styles
│   ├── js/
│   │   ├── theme.js          # Dark mode theme management
│   │   └── script.js         # Global utility functions
│   └── icons/               # Place your icons here
└── README.md                # This file
```

## Features

### ✅ Implemented Features

1. **Welcome Page** - Beautiful landing page with theme toggle
2. **Dashboard** - Employee overview with search functionality
3. **Employee Management** - Full employee list with CRUD operations
4. **File Management** - File listing, upload, and management
5. **Trash/Recovery** - Restore deleted employees and files
6. **Settings** - Application configuration and theme settings
7. **Dark Mode** - Complete dark theme with system preference detection
8. **Responsive Design** - Mobile-friendly layout
9. **Search Functionality** - Real-time search with debounce
10. **Toast Notifications** - User feedback messages

### Pages

| Page | Route | Description |
|------|-------|-------------|
| Welcome | `index.html` | Home page with navigation |
| Dashboard | `dashboard.html` | Employee overview |
| Employees | `employees.html` | Employee list and management |
| Files | `files.html` | File management interface |
| Deleted Employees | `deleted-employees.html` | Restore deleted employees |
| Deleted Files | `deleted-files.html` | Restore deleted files |
| Settings | `settings.html` | System configuration |

## Getting Started

### Quick Start

1. Open `index.html` in your web browser
2. Navigate through the menu using the sidebar
3. Click the theme toggle button in the bottom-right corner to switch themes

### File Structure Notes

- All pages are self-contained with their own inline styles
- Global styles are in `assets/css/styles.css`
- Theme management is in `assets/js/theme.js`
- Utility functions are in `assets/js/script.js`

## Customization

### Theme Colors

Edit the CSS variables in `assets/css/styles.css`:

```css
:root {
    --background: hsl(0 0% 100%);
    --foreground: hsl(0 0% 3.9%);
    --primary: hsl(0 0% 9%);
    /* ... more variables ... */
}
```

### Dark Mode

The theme automatically detects system preferences. Users can toggle with the button in the bottom-right corner.

### Adding New Pages

1. Copy an existing page (e.g., `dashboard.html`)
2. Update the page title and content
3. Add the navigation link in the sidebar
4. Include theme and script files

## Browser Support

- Chrome/Edge (Latest)
- Firefox (Latest)
- Safari (Latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Data Structure

Sample data is embedded in HTML as JSON for development:

```html
<div id="sampleData" style="display: none;">
    [
        { "id": 1, "name": "John Doe", ... }
    ]
</div>
```

Replace this with API calls when integrating with a backend.

## Functions Available

### Global Functions

- `toggleTheme()` - Toggle dark/light mode
- `navigate(path)` - Navigate to a page
- `showNotification(message, type)` - Show toast notification
- `showConfirm(message)` - Show confirmation dialog
- `formatDate(dateString)` - Format dates
- `debounce(func, delay)` - Debounce function

### Example Usage

```javascript
// Show notification
showNotification('Employee saved successfully', 'success');

// Confirm action
if (showConfirm('Delete this item?')) {
    // Perform deletion
}

// Format date
const formatted = formatDate('2024-01-15'); // "Jan 15, 2024"
```

## Deployment

### Static Hosting

This project can be deployed to any static hosting service:

- **Netlify** - Drag and drop the folder
- **GitHub Pages** - Push to gh-pages branch
- **Vercel** - Connect your repository
- **AWS S3** - Upload all files
- **Traditional Web Server** - Copy files to public directory

### No Backend Required

All data is currently stored in the HTML. For real data:

1. Set up a backend API (Node.js, Laravel, etc.)
2. Replace sample data with API calls
3. Implement authentication
4. Add database integration

## Development Tips

### Adding Search to a Page

```javascript
function handleSearch(value) {
    filteredData = data.filter(item => 
        item.name.toLowerCase().includes(value.toLowerCase())
    );
    renderTable();
}
```

### Creating Modal Dialogs

```javascript
function showModal(title, content) {
    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <h2>${title}</h2>
            <p>${content}</p>
            <button onclick="this.parentElement.parentElement.remove()">Close</button>
        </div>
    `;
    document.body.appendChild(modal);
}
```

### Loading External Data

```javascript
async function loadEmployees() {
    try {
        const response = await fetch('/api/employees');
        const data = await response.json();
        employees = data;
        renderTable();
    } catch (error) {
        showNotification('Failed to load employees', 'error');
    }
}
```

## Styling Notes

- Uses modern CSS variables for theming
- Responsive grid layout
- Flexbox for alignment
- Smooth transitions and animations
- Accessibility-friendly color contrast

## Accessibility

- Semantic HTML elements
- ARIA labels where needed
- Keyboard navigation support
- High contrast dark mode
- Focus indicators on interactive elements

## Performance

- No external dependencies (except Bootstrap Icons)
- Lightweight CSS
- Minimal JavaScript
- Lazy loading images
- Debounced search
- Optimized animations

## Future Enhancements

- [ ] Backend API integration
- [ ] Authentication system
- [ ] Database persistence
- [ ] File upload/download
- [ ] Advanced filtering
- [ ] Bulk operations
- [ ] Export to PDF/Excel
- [ ] Email notifications
- [ ] User roles and permissions
- [ ] Audit logging

## Support

For issues or questions:
1. Check the browser console for errors
2. Verify all files are in the correct directories
3. Clear browser cache if styles don't update
4. Test in different browsers

## License

This is a custom project. Modify as needed for your requirements.

## Credits

- Built with HTML5, CSS3, and JavaScript
- Uses Bootstrap Icons for UI elements
- Inspired by modern design patterns
- Tailored from original Laravel/Vue application

---

**Last Updated**: December 31, 2025
