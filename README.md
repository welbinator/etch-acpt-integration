# Etch ACPT Integration

Adds backward compatibility for the Advanced Custom Post Type (ACPT) plugin with the Etch WordPress theme.

## Problem

ACPT has built-in Etch integration, but it uses a legacy filter hook (`etch/add_dynamic_data`) that's no longer present in current versions of Etch. This causes ACPT fields to not appear in Etch's dynamic data.

## Solution

This plugin acts as a bridge between Etch's current filter hooks and ACPT's expected legacy hook, allowing ACPT fields to work seamlessly with Etch without requiring file modifications.

## Requirements

- **WordPress**: 5.8+
- **Etch Theme**: Active
- **Advanced Custom Post Type (ACPT)**: Active

## Installation

1. Download the latest release zip file
2. Upload to `wp-content/plugins/` or install via WordPress admin
3. Activate the plugin
4. ACPT fields will now be available in Etch templates under `{acpt.field_name}`

## Usage

Once activated, ACPT fields are automatically available in Etch's dynamic data:

- **Posts**: `{acpt.field_name}`
- **Terms**: `{acpt.field_name}`
- **Users**: `{acpt.field_name}`
- **Option Pages**: `{options.acpt.field_name}`

## How It Works

The plugin intercepts Etch's new dynamic data filters and triggers the legacy `etch/add_dynamic_data` hook that ACPT expects, allowing the two to work together without code modification.

## Benefits

✅ No file replacement needed  
✅ Survives Etch theme updates  
✅ Works with ACPT's existing integration  
✅ Clean, maintainable solution

## Support

For issues or feature requests, please use the [GitHub issue tracker](https://github.com/welbinator/etch-acpt-integration/issues).

## License

GPL v2 or later
