# TODO: Make Tags Index Look Like Services Index @Guest View

## Step 1: Update TagController index method
- Modify the index method to provide data for the guest view similar to ServiceController.
- Add logic to fetch $tagsImages (images associated with tags for the slider).
- Fetch $services for filter buttons.
- Handle $filteredTags based on filter parameter or all tags.
- Pass the data to the view only for guest users.

## Step 2: Update Tags Index View
- Replace the @guest section in resources/views/tags/index.blade.php with the structure from services/index.blade.php.
- Adapt the slider to use tag images instead of service images.
- Include filter buttons for services.
- Use the tags partial for displaying filtered tags.
- Ensure localization and RTL support.

## Step 3: Create Tags Partial (if needed)
- Check if services.partials.tags can be reused for tags display.
- If not, create resources/views/tags/partials/tags.blade.php based on services.partials.tags.

## Step 4: Add Filter Method in TagController
- Add a filter method similar to ServiceController for AJAX filtering.
- Update routes if necessary.

## Step 5: Test and Verify
- Test the guest view to ensure it looks like the services index.
- Check responsiveness and localization.
- Verify that the slider, filters, and tags display work correctly.
