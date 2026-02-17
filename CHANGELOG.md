# Changelog

All notable changes to this project will be documented in this file.

## [1.0.1] - 2026-02-17

### Fixed
- Added backward compatibility bridge for ACPT's `etch/add_dynamic_data` filter hook
- Plugin now properly connects Etch's new filter system with ACPT's integration

### Changed
- Rewrote plugin to use compatibility layer instead of direct field retrieval
- Simplified implementation by leveraging ACPT's existing Etch integration code

## [1.0.0] - 2026-02-17

### Added
- Initial release
- Basic ACPT field integration with Etch theme
