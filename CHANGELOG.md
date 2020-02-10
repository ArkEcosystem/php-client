# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## Unreleased

## 1.1.0 - 2019-02-11

### Added

- Implement `bridgechains/*` endpoints
- Implement `businesses/*` endpoints
- Implement `locks/*` endpoints
- Implement `rounds/*` endpoints
- Implement `node/configuration/crypto` endpoint
- Implement `transactions/fees` endpoint
- Implement `wallets/{id}/locks` endpoint

## 1.0.1 - 2019-07-07

### Added:

- Added `node/fees` endpoint

## 1.0.0 - 2018-12-18

### Changed:

- Only depend on the Guzzle client instead of Guzzle and PSR

### Removed:

- PSR dependencies
- 1.0 API Support

## 0.1.5 - 2018-12-02

### Fixed:

- Pass `query` parameters to 2.0 endpoints

## 0.1.4 - 2018-11-23

### Changed:

- Always send the `Content-Type` header

## 0.1.3 - 2018-10-31

### Fixed:

- JSON payload encoding
- Transaction posting

## 0.1.2 - 2018-10-30

### Added:

- Added `ext-mbstring` suggestion

## 0.1.1 - 2018-09-13

### Fixed:

- Add explicit class name casting with ucfirst

## 0.1.0 - 2018-06-28
- Initial Release
