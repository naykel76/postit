
## To Do's / Testing Checklist

**Routing & Access**

* it protects admin routes from unauthorised access
* it redirects unauthenticated users to login when accessing protected routes
* it prevents non-admin users from accessing post creation or editing routes
* it moves post routes to the admin group

**Post Table**

* it displays a searchable post table
* it filters posts in the table
* it sorts posts in the table
* it paginates the post table
* it handles empty search and filter states gracefully
<!-- * it persists search and filter state across pagination -->


Creating posts is disabled until such time as we work out the routing system and access control.


**CRUD Operations**

* it creates a post with valid data
* it reads a post and displays its details
* it updates a post with new data
* it deletes a post
* it handles optional fields gracefully (intro, headline, body, image, extras)
* it validates required fields when creating or updating a post


it checks

**Slug Handling**

* it ensures slugs are unique and auto-generated
* it prevents manual slug override if slug auto-generation is enforced
* it allows custom slugs when explicitly provided

**Publishing**

* it toggles the published status of a post
* it displays the correct status label and colour for each post

**Layout & Views**

* it selects and renders the correct layout for a post
* it returns the correct view for each layout in the ShowPostController
* it loads custom local views when available

**Form Behaviour (UI)**

* it shows a message when the form is dirty and the user tries to leave the page
* it preserves form input on validation errors
* it clears the form after successful post creation
* it focuses the first invalid field on validation failure

**Image Handling**

* it uploads and stores images correctly
* it replaces the existing image when uploading a new one
* it deletes the old image file from storage when updated
* it removes associated images when a post is deleted

**Soft Deletes (if applicable)**

* it moves posts to the trash instead of permanently deleting
* it restores soft-deleted posts
* it permanently deletes trashed posts

**Factories & Fixtures**

* it generates valid post data using the factory
* it generates factory data that matches all validation rules
* it includes all optional fields in factory output when requested

**Livewire / Component Behaviour (if used)**

* it renders the post creation component correctly
* it handles form submission in Livewire without a page reload
* it shows real-time validation feedback in the Livewire form

**Service Provider**

* it creates the correct database schema via migration
* it loads package views, migrations, and routes
* it merges package config correctly (if applicable)
* it publishes config, views, and assets using artisan

