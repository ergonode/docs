# Ergonode Contributing Guide

Yoo! We're really excited that you are interested in contributing to Ergonode. <br>
As a contributor, here are the guidelines we would like you to follow.

## Code of Conduct
---
Please read and follow our [Code of Conduct][coc].

## Getting started
---
Get the Ergonode Source Code:
* Create a [GitHub][github-join] account and sign in
* Click on the "Fork button" in one of [Ergonode][github] repositories:
  * [backend][github-backend]
  * [frontend][github-frontend]
  * [docker][github-docker]
  * [documentation][github-docs]
* After the “forking action” has completed, clone your fork locally (for example use [documentation][github-docs])
```bash
git clone git@github.com:YOUR_USERNAME/docs.git
```
* Add the upstream repository as a remote
```bash
cd docs
git remote add upstream git@github.com:ergonode/docs.git
```
* Pull the latest changes from upstream
```bash
git pull upstream master
```
<div class="Alert Alert--warning">
    For documentation, the main branch is <strong>develop</strong>.
</div>

* Create a new branch
```bash
git checkout -b YOUR_BRANCH_NAME 
```
* Make changes
* Commit your changes use [commit message convention][cc] and push
```bash
git commit -m "feature: Add github fork start info" -a
git push origin YOUR_BRANCH_NAME
```
* Create the pull request from Your fork to Ergonode repository at [GitHub][github]
* Before you start next feature sync your fork
```bash
git checkout master
git pull upstream master
git push origin master
``` 

## Got a Question or Problem?
---

**Do not open issues for general support questions as we want to keep GitHub issues for bug reports and feature requests.**<br>
You've got much better chances of getting your question answered when you [contact][contact] with us

## Found a Bug?
---

If you find a bug in the source code, you can help us by submitting an issue to our [GitHub Repository][github].

- backend repository [issues][github-backend-issue]
- frontend repository [issues][github-frontend-issue]
- docker repository [issues][github-docker-issue]

Or if you see errors in the documentation you can report them [here][github-docs-issue]

## Coding Rules
---
To ensure consistency throughout the source code, keep these rules in mind as you are working:

* All features or bug fixes **should be tested** by one or more specs (unit-tests).
* Add **e2e** tests if needed.
* All features should have **documentation**.

## Pull Request Guidelines
---

- Checkout a topic branch from the relevant branch, e.g. `master`, and merge back against that branch.

- It's OK to have multiple small commits as you work on the PR - GitHub will automatically squash it before merging.

- Make sure all tests pass.

- Make sure the documentation is up to date

- If adding a new feature:
  - Add accompanying test case if needed.
  - Provide a convincing reason to add this feature. Ideally, you should open a suggestion issue first and have it approved before working on it.
  - Add `(#xxxx[,#xxxx])` (#xxxx is the issue id) in your PR title for a better release log.

- If fixing bug:
  - If you are resolving a special issue, add `(fix #xxxx[,#xxxx])` (#xxxx is the issue id) in your PR title for a better release log, e.g. `update entities encoding/decoding (fix #1234)`.
  - Provide a detailed description of the bug in the PR. Live demo preferred.
  - Add appropriate test coverage if applicable.

## Committing Changes
---
Commit messages should follow the [commit message convention][cc].

## Credits

Thank you to all the people who have already contributed to Ergonode!

[coc]: community/code_of_conduct.md
[cc]: community/commit_convention.md
[github]: https://github.com/ergonode
[github-join]: https://github.com/join
[github-backend]: https://github.com/ergonode/backend/issues
[github-frontend]: https://github.com/ergonode/frontend/issues
[github-docker]: https://github.com/ergonode/docker/issues
[github-docs]: https://github.com/ergonode/docs/
[github-backend-issue]: https://github.com/ergonode/backend/issues
[github-frontend-issue]: https://github.com/ergonode/frontend/issues
[github-docker-issue]: https://github.com/ergonode/docker/issues
[github-docs-issue]: https://github.com/ergonode/docs/issues
[contact]: contact
