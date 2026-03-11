	<!--begin::Aside-->
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="kt_brand">
						<!--begin::Logo-->
						<a href="index.html" class="brand-logo">
							<img alt="Logo" src="{{asset('dashboard/assets/media/logos/logo-light.png')}}" />
						</a>
						<!--end::Logo-->
						<!--begin::Toggle-->
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</button>
						<!--end::Toolbar-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<li class="menu-item menu-item-active" aria-haspopup="true">
									<a href="{{url('dashbohome')}}" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">لوحه التحكم</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Custom</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Applications</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Applications</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Users</span>
													<span class="menu-label">
														<span class="label label-rounded label-primary">6</span>
													</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-default.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Default</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-datatable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Datatable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-columns-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-columns-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/add-user.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Add User</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/edit-user.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Edit User</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Profile</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 1</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/overview.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Overview</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/personal-information.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Personal Information</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/account-information.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Account Information</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/change-password.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Change Password</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/email-settings.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Email Settings</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/profile/profile-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/profile/profile-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/profile/profile-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 4</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Contacts</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/list-columns.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/list-datatable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Datatable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/view-contact.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">View Contact</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/add-contact.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Add Contact</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/edit-contact.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Edit Contact</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Projects</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 4</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-datatable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Datatable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/view-project.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">View Project</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/add-project.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Add Project</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/edit-project.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Edit Project</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Support Center</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/home-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Home 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/home-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Home 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/faq-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">FAQ 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/faq-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">FAQ 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/faq-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">FAQ 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/feedback.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Feedback</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/license.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">License</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Chat</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/chat/private.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Private</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/chat/group.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Group</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/chat/popup.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Popup</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Todo</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/todo/tasks.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Tasks</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/todo/docs.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Docs</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/todo/files.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Files</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="custom/apps/inbox.html" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Inbox</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
													<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Pages</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Pages</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Login</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 4</span>
															</a>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 5</span>
																<span class="menu-label">
																	<span class="label label-inline label-info">Wizard</span>
																</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-5/signup.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Sign Up</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-5/signin.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Sign In</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-5/forgot.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Forgot Password</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Classic</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-1.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 1</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-2.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 3</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-3.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 4</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-4.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 5</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Wizard</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 4</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Pricing Tables</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 4</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Invoices</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 2</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Error</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 4</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-5.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 5</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-6.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 6</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="kt_brand" kt-hidden-height="65" style="">
						<!--begin::Logo-->
						<a href="index.html" class="brand-logo">
							<img alt="Logo" src="assets/media/logos/logo-light.png">
						</a>
						<!--end::Logo-->
						<!--begin::Toggle-->
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"></polygon>
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"></path>
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"></path>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</button>
						<!--end::Toolbar-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500" style="height: 233px; overflow: hidden;">
							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<li class="menu-item" aria-haspopup="true">
									<a href="index.html" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"></polygon>
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Dashboard</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Custom</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Applications</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Applications</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Users</span>
													<span class="menu-label">
														<span class="label label-rounded label-primary">6</span>
													</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-default.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Default</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-datatable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Datatable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-columns-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-columns-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/add-user.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Add User</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/edit-user.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Edit User</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Profile</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 1</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/overview.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Overview</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/personal-information.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Personal Information</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/account-information.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Account Information</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/change-password.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Change Password</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/email-settings.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Email Settings</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/profile/profile-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/profile/profile-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/profile/profile-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 4</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Contacts</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/list-columns.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/list-datatable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Datatable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/view-contact.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">View Contact</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/add-contact.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Add Contact</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/edit-contact.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Edit Contact</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Projects</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 4</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-datatable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Datatable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/view-project.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">View Project</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/add-project.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Add Project</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/edit-project.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Edit Project</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Support Center</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/home-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Home 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/home-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Home 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/faq-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">FAQ 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/faq-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">FAQ 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/faq-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">FAQ 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/feedback.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Feedback</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/license.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">License</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Chat</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/chat/private.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Private</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/chat/group.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Group</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/chat/popup.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Popup</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Todo</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/todo/tasks.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Tasks</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/todo/docs.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Docs</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/todo/files.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Files</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="custom/apps/inbox.html" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Inbox</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"></rect>
													<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Pages</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Pages</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Login</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 4</span>
															</a>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 5</span>
																<span class="menu-label">
																	<span class="label label-inline label-info">Wizard</span>
																</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-5/signup.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Sign Up</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-5/signin.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Sign In</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-5/forgot.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Forgot Password</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Classic</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-1.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 1</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-2.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 3</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-3.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 4</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-4.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 5</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Wizard</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 4</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Pricing Tables</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 4</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Invoices</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 2</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Error</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 4</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-5.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 5</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-6.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 6</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Layout</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)"></path>
													<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Themes</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Themes</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/themes/aside-light.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Light Aside</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/themes/header-dark.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dark Header</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"></path>
													<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Subheaders</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Subheaders</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/toolbar.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Toolbar Nav</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/actions.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Actions Buttons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/tabbed.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tabbed Nav</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/classic.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Classic</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/none.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">None</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
													<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">General</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">General</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/fluid-content.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Fluid Content</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/minimized-aside.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Minimized Aside</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/no-aside.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">No Aside</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/empty-page.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Empty Page</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/fixed-footer.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Fixed Footer</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/no-header-menu.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">No Header Menu</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item" aria-haspopup="true">
									<a target="_blank" href="https://keenthemes.com/metronic/preview/demo1/builder.html" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
													<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Builder</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">CRUD</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
													<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Forms</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Forms</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Controls</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/base.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Base Inputs</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/input-group.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Input Groups</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/checkbox.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Checkbox</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/radio.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Radio</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/switch.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Switch</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/option.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Mega Options</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Widgets</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-datepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Datepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-datetimepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Datetimepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-timepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Timepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-daterangepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Daterangepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/tagify.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Tagify</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-touchspin.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Touchspin</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-maxlength.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Maxlength</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-switch.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Switch</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-multipleselectsplitter.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Multiple Select Splitter</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-select.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Bootstrap Select</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/select2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Select2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/typeahead.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Typeahead</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/nouislider.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">noUiSlider</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/form-repeater.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Form Repeater</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/ion-range-slider.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ion Range Slider</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/input-mask.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Input Masks</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/autosize.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Autosize</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/clipboard.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Clipboard</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/recaptcha.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Google reCaptcha</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Text Editors</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/tinymce.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">TinyMCE</span>
															</a>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">CKEditor</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-classic.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Classic</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-inline.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Inline</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-balloon.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Balloon</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-balloon-block.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Balloon Block</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-document.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Document</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/quill.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Quill Text Editor</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/summernote.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Summernote WYSIWYG</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/bootstrap-markdown.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Markdown Editor</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Layouts</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/default-forms.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Default Forms</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/multi-column-forms.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Multi Column Forms</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/action-bars.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Basic Action Bars</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/sticky-action-bar.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Sticky Action Bar</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Validation</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/validation/states.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Validation States</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/validation/form-controls.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Form Controls</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/validation/form-widgets.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Form Widgets</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-left-panel-2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"></path>
													<rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1"></rect>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">KTDatatable</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">KTDatatable</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Base</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/data-local.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Local Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/data-json.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">JSON Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/data-ajax.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ajax Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/html-table.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">HTML Table</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/local-sort.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Local Sort</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/translation.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Translation</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advanced</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/record-selection.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Record Selection</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/row-details.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Row Details</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/modal.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Modal Examples</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/column-rendering.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Rendering</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/column-width.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Width</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/vertical.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Vertical Scrolling</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Child Datatables</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/child/data-local.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Local Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/child/data-ajax.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Remote Data</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">API</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/api/methods.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">API Methods</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/api/events.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Events</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-horizontal.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="6" rx="1.5"></rect>
													<rect fill="#000000" x="4" y="13" width="16" height="6" rx="1.5"></rect>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Datatables.net</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Datatables.net</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Basic</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/basic.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Basic Tables</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/scrollable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Scrollable Tables</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/headers.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Complex Headers</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/paginations.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pagination Options</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advanced</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/column-rendering.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Rendering</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/multiple-controls.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Multiple Controls</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/column-visibility.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Visibility</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/row-callback.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Row Callback</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/row-grouping.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Row Grouping</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/footer-callback.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Footer Callback</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Data sources</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/html.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">HTML</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/javascript.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Javascript</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/ajax-client-side.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ajax Client-side</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/ajax-server-side.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ajax Server-side</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Search Options</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/search-options/column-search.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Search</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/search-options/advanced-search.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Advanced Search</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Extensions</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/buttons.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Buttons</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/colreorder.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">ColReorder</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/keytable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">KeyTable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/responsive.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Responsive</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/rowgroup.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">RowGroup</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/rowreorder.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">RowReorder</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/scroller.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Scroller</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/select.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Select</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Files/Upload.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
													<rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1"></rect>
													<path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" fill="#000000" fill-rule="nonzero"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">File Upload</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="crud/file-upload/image-input.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Image Input</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="crud/file-upload/dropzonejs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">DropzoneJS</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="crud/file-upload/uppy.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Uppy</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Features</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"></path>
													<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Bootstrap</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Bootstrap</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/typography.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Typography</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/buttons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Buttons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/button-group.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Button Group</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/dropdown.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dropdown</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/navs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Navs</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/tables.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tables</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/progress.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Progress</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/modal.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Modal</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/alerts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Alerts</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/popover.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Popover</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/tooltip.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tooltip</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Files/Pictures1.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"></path>
													<polygon fill="#000000" opacity="0.3" points="4 19 10 11 16 19"></polygon>
													<polygon fill="#000000" points="11 19 15 14 19 19"></polygon>
													<path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Custom</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Custom</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/utilities.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Utilities</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/label.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Labels</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/pulse.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Pulse</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/line-tabs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Line Tabs</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/advance-navs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advance Navs</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/timeline.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Timeline</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/pagination.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Pagination</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/symbol.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Symbol</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/overlay.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Overlay</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/spinners.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Spinners</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/iconbox.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Iconbox</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/callout.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Callout</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/ribbons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Ribbons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/accordions.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Accordions</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-arrange.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000"></path>
													<path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Cards</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Cards</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/general.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">General Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/stacked.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Stacked Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/tabbed.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tabbed Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/draggable.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Draggable Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/tools.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Cards Tools</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/sticky.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Sticky Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/stretched.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Stretched Cards</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu menu-item-open menu-item-here" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Diagnostics.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="18" rx="2"></rect>
													<path d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z" fill="#000000" fill-rule="nonzero"></path>
													<circle fill="#000000" opacity="0.3" cx="19" cy="6" r="1"></circle>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Widgets</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Widgets</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/lists.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Lists</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/stats.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Stats</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/charts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Charts</span>
												</a>
											</li>
											<li class="menu-item menu-item-active" aria-haspopup="true">
												<a href="features/widgets/mixed.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Mixed</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/tiles.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tiles</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/engage.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Engage</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/base-tables.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Base Tables</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/advance-tables.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advance Tables</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/forms.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Forms</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)"></path>
													<path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)"></path>
													<path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)"></path>
													<path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Icons</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/svg.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">SVG Icons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/custom-icons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Custom Icons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/flaticon.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Flaticon</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/fontawesome5.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Fontawesome 5</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/lineawesome.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Lineawesome</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/socicons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Socicons</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Select.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"></polygon>
													<path d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z" fill="#000000" opacity="0.3"></path>
													<path d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z" fill="#000000"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Calendar</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Calendar</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/basic.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Basic Calendar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/list-view.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">List Views</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/google.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Google Calendar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/external-events.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">External Events</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/background-events.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Background Events</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
													<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
													<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
													<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Charts</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Charts</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/charts/apexcharts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Apexcharts</span>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">amCharts</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="features/charts/amcharts/charts.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">amCharts Charts</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="features/charts/amcharts/stock-charts.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">amCharts Stock Charts</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="features/charts/amcharts/maps.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">amCharts Maps</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/charts/flotcharts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Flot Charts</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/charts/google-charts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Google Charts</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Book-open.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"></path>
													<path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Maps</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Maps</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/maps/google-maps.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Google Maps</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/maps/leaflet.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Leaflet</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/maps/jqvmap.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">JQVMap</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z" fill="#000000" fill-rule="nonzero"></path>
													<path d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Miscellaneous</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Miscellaneous</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/kanban-board.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Kanban Board</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/sticky-panels.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Sticky Panels</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/blockui.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Block UI</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/perfect-scrollbar.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Perfect Scrollbar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/treeview.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tree View</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/bootstrap-notify.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Bootstrap Notify</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/toastr.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Toastr</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/sweetalert2.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">SweetAlert2</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/dual-listbox.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dual Listbox</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/session-timeout.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Session Timeout</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/idle-timer.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Idle Timer</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/cropper.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Cropper</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
							<!--end::Menu Nav-->
						<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 233px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 40px;"></div></div></div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Menu-->
								<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
									<!--begin::Header Nav-->
									<ul class="menu-nav">
										<li class="menu-item menu-item-submenu menu-item-rel menu-item-active" data-menu-toggle="click" aria-haspopup="true">
											<a href="javascript:;" class="menu-link menu-toggle">
												<span class="menu-text">Pages</span>
												<i class="menu-arrow"></i>
											</a>
											<div class="menu-submenu menu-submenu-classic menu-submenu-left">
												<ul class="menu-subnav">
													<li class="menu-item" aria-haspopup="true">
														<a href="index.html" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Clothes/Briefcase.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000"></path>
																		<path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">My Account</span>
														</a>
													</li>
													<li class="menu-item" aria-haspopup="true">
														<a href="javascript:;" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Task Manager</span>
															<span class="menu-label">
																<span class="label label-success label-rounded">2</span>
															</span>
														</a>
													</li>
													<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
														<a href="javascript:;" class="menu-link menu-toggle">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Code/CMD.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M9,15 L7.5,15 C6.67157288,15 6,15.6715729 6,16.5 C6,17.3284271 6.67157288,18 7.5,18 C8.32842712,18 9,17.3284271 9,16.5 L9,15 Z M9,15 L9,9 L15,9 L15,15 L9,15 Z M15,16.5 C15,17.3284271 15.6715729,18 16.5,18 C17.3284271,18 18,17.3284271 18,16.5 C18,15.6715729 17.3284271,15 16.5,15 L15,15 L15,16.5 Z M16.5,9 C17.3284271,9 18,8.32842712 18,7.5 C18,6.67157288 17.3284271,6 16.5,6 C15.6715729,6 15,6.67157288 15,7.5 L15,9 L16.5,9 Z M9,7.5 C9,6.67157288 8.32842712,6 7.5,6 C6.67157288,6 6,6.67157288 6,7.5 C6,8.32842712 6.67157288,9 7.5,9 L9,9 L9,7.5 Z M11,13 L13,13 L13,11 L11,11 L11,13 Z M13,11 L13,7.5 C13,5.56700338 14.5670034,4 16.5,4 C18.4329966,4 20,5.56700338 20,7.5 C20,9.43299662 18.4329966,11 16.5,11 L13,11 Z M16.5,13 C18.4329966,13 20,14.5670034 20,16.5 C20,18.4329966 18.4329966,20 16.5,20 C14.5670034,20 13,18.4329966 13,16.5 L13,13 L16.5,13 Z M11,16.5 C11,18.4329966 9.43299662,20 7.5,20 C5.56700338,20 4,18.4329966 4,16.5 C4,14.5670034 5.56700338,13 7.5,13 L11,13 L11,16.5 Z M7.5,11 C5.56700338,11 4,9.43299662 4,7.5 C4,5.56700338 5.56700338,4 7.5,4 C9.43299662,4 11,5.56700338 11,7.5 L11,11 L7.5,11 Z" fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Team Manager</span>
															<i class="menu-arrow"></i>
														</a>
														<div class="menu-submenu menu-submenu-classic menu-submenu-right">
															<ul class="menu-subnav">
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Add Team Member</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Edit Team Member</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Delete Team Member</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Team Member Reports</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Assign Tasks</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Promote Team Member</span>
																	</a>
																</li>
															</ul>
														</div>
													</li>
													<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
														<a href="#" class="menu-link menu-toggle">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-box.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M22,15 L22,19 C22,20.1045695 21.1045695,21 20,21 L4,21 C2.8954305,21 2,20.1045695 2,19 L2,15 L6.27924078,15 L6.82339262,16.6324555 C7.09562072,17.4491398 7.8598984,18 8.72075922,18 L15.381966,18 C16.1395101,18 16.8320364,17.5719952 17.1708204,16.8944272 L18.118034,15 L22,15 Z" fill="#000000"></path>
																		<path d="M2.5625,13 L5.92654389,7.01947752 C6.2807805,6.38972356 6.94714834,6 7.66969497,6 L16.330305,6 C17.0528517,6 17.7192195,6.38972356 18.0734561,7.01947752 L21.4375,13 L18.118034,13 C17.3604899,13 16.6679636,13.4280048 16.3291796,14.1055728 L15.381966,16 L8.72075922,16 L8.17660738,14.3675445 C7.90437928,13.5508602 7.1401016,13 6.27924078,13 L2.5625,13 Z" fill="#000000" opacity="0.3"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Projects Manager</span>
															<i class="menu-arrow"></i>
														</a>
														<div class="menu-submenu menu-submenu-classic menu-submenu-right">
															<ul class="menu-subnav">
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Latest Projects</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Ongoing Projects</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Urgent Projects</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Completed Projects</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Dropped Projects</span>
																	</a>
																</li>
															</ul>
														</div>
													</li>
													<li class="menu-item" aria-haspopup="true">
														<a href="javascript:;" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Spam.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z M10.5857864,14 L9.17157288,15.4142136 C8.78104858,15.8047379 8.78104858,16.4379028 9.17157288,16.8284271 C9.56209717,17.2189514 10.1952621,17.2189514 10.5857864,16.8284271 L12,15.4142136 L13.4142136,16.8284271 C13.8047379,17.2189514 14.4379028,17.2189514 14.8284271,16.8284271 C15.2189514,16.4379028 15.2189514,15.8047379 14.8284271,15.4142136 L13.4142136,14 L14.8284271,12.5857864 C15.2189514,12.1952621 15.2189514,11.5620972 14.8284271,11.1715729 C14.4379028,10.7810486 13.8047379,10.7810486 13.4142136,11.1715729 L12,12.5857864 L10.5857864,11.1715729 C10.1952621,10.7810486 9.56209717,10.7810486 9.17157288,11.1715729 C8.78104858,11.5620972 8.78104858,12.1952621 9.17157288,12.5857864 L10.5857864,14 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Create New Project</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
											<a href="javascript:;" class="menu-link menu-toggle">
												<span class="menu-text">Features</span>
												<i class="menu-arrow"></i>
											</a>
											<div class="menu-submenu menu-submenu-fixed menu-submenu-left" style="width:1000px">
												<div class="menu-subnav">
													<ul class="menu-content">
														<li class="menu-item">
															<h3 class="menu-heading menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Task Reports</span>
																<i class="menu-arrow"></i>
															</h3>
															<ul class="menu-inner">
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="svg-icon menu-icon">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Clothes/Briefcase.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000"></path>
																					<path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																		<span class="menu-text">Latest Tasks</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="svg-icon menu-icon">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Clothes/Crown.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24"></polygon>
																					<path d="M11.2600599,5.81393408 L2,16 L22,16 L12.7399401,5.81393408 C12.3684331,5.40527646 11.7359848,5.37515988 11.3273272,5.7466668 C11.3038503,5.7680094 11.2814025,5.79045722 11.2600599,5.81393408 Z" fill="#000000" opacity="0.3"></path>
																					<path d="M12.0056789,15.7116802 L20.2805786,6.85290308 C20.6575758,6.44930487 21.2903735,6.42774054 21.6939717,6.8047378 C21.8964274,6.9938498 22.0113578,7.25847607 22.0113578,7.535517 L22.0113578,20 L16.0113578,20 L2,20 L2,7.535517 C2,7.25847607 2.11493033,6.9938498 2.31738608,6.8047378 C2.72098429,6.42774054 3.35378194,6.44930487 3.7307792,6.85290308 L12.0056789,15.7116802 Z" fill="#000000"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																		<span class="menu-text">Pending Tasks</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="svg-icon menu-icon">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Lock-overturning.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"></path>
																					<path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																		<span class="menu-text">Urgent Tasks</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="svg-icon menu-icon">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Thumbtack.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z" fill="#000000"></path>
																					<polygon fill="#000000" opacity="0.3" transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747)" points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475"></polygon>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																		<span class="menu-text">Completed Tasks</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="svg-icon menu-icon">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Outgoing-box.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M22,17 L22,21 C22,22.1045695 21.1045695,23 20,23 L4,23 C2.8954305,23 2,22.1045695 2,21 L2,17 L6.27924078,17 L6.82339262,18.6324555 C7.09562072,19.4491398 7.8598984,20 8.72075922,20 L15.381966,20 C16.1395101,20 16.8320364,19.5719952 17.1708204,18.8944272 L18.118034,17 L22,17 Z" fill="#000000"></path>
																					<path d="M2.5625,15 L5.92654389,9.01947752 C6.2807805,8.38972356 6.94714834,8 7.66969497,8 L16.330305,8 C17.0528517,8 17.7192195,8.38972356 18.0734561,9.01947752 L21.4375,15 L18.118034,15 C17.3604899,15 16.6679636,15.4280048 16.3291796,16.1055728 L15.381966,18 L8.72075922,18 L8.17660738,16.3675445 C7.90437928,15.5508602 7.1401016,15 6.27924078,15 L2.5625,15 Z" fill="#000000" opacity="0.3"></path>
																					<path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.959697, 3.661508) rotate(-90.000000) translate(-11.959697, -3.661508)"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																		<span class="menu-text">Failed Tasks</span>
																	</a>
																</li>
															</ul>
														</li>
														<li class="menu-item">
															<h3 class="menu-heading menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profit Margins</span>
																<i class="menu-arrow"></i>
															</h3>
															<ul class="menu-inner">
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Overall Profits</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Gross Profits</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Nett Profits</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Year to Date Reports</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Quarterly Profits</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Monthly Profits</span>
																	</a>
																</li>
															</ul>
														</li>
														<li class="menu-item">
															<h3 class="menu-heading menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Staff Management</span>
																<i class="menu-arrow"></i>
															</h3>
															<ul class="menu-inner">
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Top Management</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Project Managers</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Development Staff</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Customer Service</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Sales and Marketing</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Executives</span>
																	</a>
																</li>
															</ul>
														</li>
														<li class="menu-item">
															<h3 class="menu-heading menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Tools</span>
																<i class="menu-arrow"></i>
															</h3>
															<ul class="menu-inner">
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="menu-text">Analytical Reports</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="menu-text">Customer CRM</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="menu-text">Operational Growth</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="menu-text">Social Media Presence</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="menu-text">Files and Directories</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<span class="menu-text">Audit &amp; Logs</span>
																	</a>
																</li>
															</ul>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
											<a href="javascript:;" class="menu-link menu-toggle">
												<span class="menu-text">Apps</span>
												<i class="menu-arrow"></i>
											</a>
											<div class="menu-submenu menu-submenu-classic menu-submenu-left">
												<ul class="menu-subnav">
													<li class="menu-item" aria-haspopup="true">
														<a href="javascript:;" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Safe-chat.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M8,17 C8.55228475,17 9,17.4477153 9,18 L9,21 C9,21.5522847 8.55228475,22 8,22 L3,22 C2.44771525,22 2,21.5522847 2,21 L2,18 C2,17.4477153 2.44771525,17 3,17 L3,16.5 C3,15.1192881 4.11928813,14 5.5,14 C6.88071187,14 8,15.1192881 8,16.5 L8,17 Z M5.5,15 C4.67157288,15 4,15.6715729 4,16.5 L4,17 L7,17 L7,16.5 C7,15.6715729 6.32842712,15 5.5,15 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Reporting</span>
														</a>
													</li>
													<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
														<a href="javascript:;" class="menu-link menu-toggle">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Send.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Social Presence</span>
															<i class="menu-arrow"></i>
														</a>
														<div class="menu-submenu menu-submenu-classic menu-submenu-right">
															<ul class="menu-subnav">
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Reached Users</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">SEO Ranking</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">User Dropout Points</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Market Segments</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-dot">
																			<span></span>
																		</i>
																		<span class="menu-text">Opportunity Growth</span>
																	</a>
																</li>
															</ul>
														</div>
													</li>
													<li class="menu-item" aria-haspopup="true">
														<a href="javascript:;" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-at.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M11.575,21.2 C6.175,21.2 2.85,17.4 2.85,12.575 C2.85,6.875 7.375,3.05 12.525,3.05 C17.45,3.05 21.125,6.075 21.125,10.85 C21.125,15.2 18.825,16.925 16.525,16.925 C15.4,16.925 14.475,16.4 14.075,15.65 C13.3,16.4 12.125,16.875 11,16.875 C8.25,16.875 6.85,14.925 6.85,12.575 C6.85,9.55 9.05,7.1 12.275,7.1 C13.2,7.1 13.95,7.35 14.525,7.775 L14.625,7.35 L17,7.35 L15.825,12.85 C15.6,13.95 15.85,14.825 16.925,14.825 C18.25,14.825 19.025,13.725 19.025,10.8 C19.025,6.9 15.95,5.075 12.5,5.075 C8.625,5.075 5.05,7.75 5.05,12.575 C5.05,16.525 7.575,19.1 11.575,19.1 C13.075,19.1 14.625,18.775 15.975,18.075 L16.8,20.1 C15.25,20.8 13.2,21.2 11.575,21.2 Z M11.4,14.525 C12.05,14.525 12.7,14.35 13.225,13.825 L14.025,10.125 C13.575,9.65 12.925,9.425 12.3,9.425 C10.65,9.425 9.45,10.7 9.45,12.375 C9.45,13.675 10.075,14.525 11.4,14.525 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Sales &amp; Marketing</span>
														</a>
													</li>
													<li class="menu-item" aria-haspopup="true">
														<a href="javascript:;" class="menu-link">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-locked.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5"></polygon>
																		<path d="M16,10 L16,9.5 C16,8.11928813 14.8807119,7 13.5,7 C12.1192881,7 11,8.11928813 11,9.5 L11,10 C10.4477153,10 10,10.4477153 10,11 L10,14 C10,14.5522847 10.4477153,15 11,15 L16,15 C16.5522847,15 17,14.5522847 17,14 L17,11 C17,10.4477153 16.5522847,10 16,10 Z M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M13.5,8 L13.5,8 C14.3284271,8 15,8.67157288 15,9.5 L15,10 L12,10 L12,9.5 C12,8.67157288 12.6715729,8 13.5,8 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Campaigns</span>
															<span class="menu-label">
																<span class="label label-success label-rounded">3</span>
															</span>
														</a>
													</li>
													<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
														<a href="javascript:;" class="menu-link menu-toggle">
															<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
																		<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-text">Deployment Center</span>
															<i class="menu-arrow"></i>
														</a>
														<div class="menu-submenu menu-submenu-classic menu-submenu-right">
															<ul class="menu-subnav">
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Merge Branch</span>
																		<span class="menu-label">
																			<span class="label label-danger label-rounded">3</span>
																		</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Version Controls</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">Database Manager</span>
																	</a>
																</li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="javascript:;" class="menu-link">
																		<i class="menu-bullet menu-bullet-line">
																			<span></span>
																		</i>
																		<span class="menu-text">System Settings</span>
																	</a>
																</li>
															</ul>
														</div>
													</li>
												</ul>
											</div>
										</li>
									</ul>
									<!--end::Header Nav-->
								</div>
								<!--end::Header Menu-->
							</div>
							<!--end::Header Menu Wrapper-->
							<!--begin::Topbar-->
							<div class="topbar">
								<!--begin::Search-->
								<div class="dropdown" id="kt_quick_search_toggle">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
														<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
										<div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
											<!--begin:Form-->
											<form method="get" class="quick-search-form">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
													<input type="text" class="form-control" placeholder="Search...">
													<div class="input-group-append">
														<span class="input-group-text">
															<i class="quick-search-close ki ki-close icon-sm text-muted"></i>
														</span>
													</div>
												</div>
											</form>
											<!--end::Form-->
											<!--begin::Scroll-->
											<div class="quick-search-wrapper scroll ps" data-scroll="true" data-height="325" data-mobile-height="200" style="height: 325px; overflow: hidden;"><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
											<!--end::Scroll-->
										</div>
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Search-->
								<!--begin::Notifications-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"></path>
														<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"></path>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="pulse-ring"></span>
										</div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
										<form>
											<!--begin::Header-->
											<div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(assets/media/misc/bg-1.jpg)">
												<!--begin::Title-->
												<h4 class="d-flex flex-center rounded-top">
													<span class="text-white">User Notifications</span>
													<span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23 new</span>
												</h4>
												<!--end::Title-->
												<!--begin::Tabs-->
												<ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
													<li class="nav-item">
														<a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">Alerts</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#topbar_notifications_events">Events</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs">Logs</a>
													</li>
												</ul>
												<!--end::Tabs-->
											</div>
											<!--end::Header-->
											<!--begin::Content-->
											<div class="tab-content">
												<!--begin::Tabpane-->
												<div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
													<!--begin::Scroll-->
													<div class="scroll pr-7 mr-n7 ps" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-primary mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-primary">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"></rect>
																				<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
																				<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Cool App</a>
																<span class="text-muted">Marketing campaign planning</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-warning mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-warning">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"></rect>
																				<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
																				<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg">Awesome SAAS</a>
																<span class="text-muted">Project status update meeting</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-success mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-success">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"></rect>
																				<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
																				<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Claudy Sys</a>
																<span class="text-muted">Project Deployment &amp; Launch</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-danger mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-danger">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"></rect>
																				<path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)"></path>
																				<path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)"></path>
																				<path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)"></path>
																				<path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)"></path>
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Trilo Service</a>
																<span class="text-muted">Analytics &amp; Requirement Study</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-info mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-info">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"></rect>
																				<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
																				<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"></path>
																				<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"></path>
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Bravia SAAS</a>
																<span class="text-muted">Reporting Application</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-danger mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-danger">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"></rect>
																				<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
																				<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Express Wind</a>
																<span class="text-muted">Software Analytics &amp; Design</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-success mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-success">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"></rect>
																				<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)"></path>
																				<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3"></path>
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Bruk Fitness</a>
																<span class="text-muted">Web Design &amp; Development</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
													<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
													<!--end::Scroll-->
												</div>
												<!--end::Tabpane-->
												<!--begin::Tabpane-->
												<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
													<!--begin::Nav-->
													<div class="navi navi-hover scroll my-4 ps" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-line-chart text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New report has been received</div>
																	<div class="text-muted">23 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-paper-plane text-danger"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">Finance report has been generated</div>
																	<div class="text-muted">25 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-user flaticon2-line- text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New order has been received</div>
																	<div class="text-muted">2 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-pin text-primary"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New customer is registered</div>
																	<div class="text-muted">3 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-sms text-danger"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">Application has been approved</div>
																	<div class="text-muted">3 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-pie-chart-3 text-warning"></i>
																</div>
																<div class="navinavinavi-text">
																	<div class="font-weight-bold">New file has been uploaded</div>
																	<div class="text-muted">5 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon-pie-chart-1 text-info"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New user feedback received</div>
																	<div class="text-muted">8 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-settings text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">System reboot has been successfully completed</div>
																	<div class="text-muted">12 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon-safe-shield-protection text-primary"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New order has been placed</div>
																	<div class="text-muted">15 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-notification text-primary"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">Company meeting canceled</div>
																	<div class="text-muted">19 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-fax text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New report has been received</div>
																	<div class="text-muted">23 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon-download-1 text-danger"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">Finance report has been generated</div>
																	<div class="text-muted">25 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon-security text-warning"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New customer comment recieved</div>
																	<div class="text-muted">2 days ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-analytics-1 text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New customer is registered</div>
																	<div class="text-muted">3 days ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
													<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
													<!--end::Nav-->
												</div>
												<!--end::Tabpane-->
												<!--begin::Tabpane-->
												<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
													<!--begin::Nav-->
													<div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
													<br>No new notifications.</div>
													<!--end::Nav-->
												</div>
												<!--end::Tabpane-->
											</div>
											<!--end::Content-->
										</form>
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Notifications-->
								<!--begin::Quick Actions-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
														<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
														<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
														<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
										<!--begin:Header-->
										<div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(assets/media/misc/bg-1.jpg)">
											<h4 class="text-white font-weight-bold">Quick Actions</h4>
											<span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">23 tasks pending</span>
										</div>
										<!--end:Header-->
										<!--begin:Nav-->
										<div class="row row-paddingless">
											<!--begin:Item-->
											<div class="col-6">
												<a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Euro.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"></rect>
																<path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3"></path>
																<path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000"></path>
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Accounting</span>
													<span class="d-block text-dark-50 font-size-lg">eCommerce</span>
												</a>
											</div>
											<!--end:Item-->
											<!--begin:Item-->
											<div class="col-6">
												<a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-bottom">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-attachment.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"></rect>
																<path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" fill="#000000" opacity="0.3"></path>
																<path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" fill="#000000"></path>
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Administration</span>
													<span class="d-block text-dark-50 font-size-lg">Console</span>
												</a>
											</div>
											<!--end:Item-->
											<!--begin:Item-->
											<div class="col-6">
												<a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"></rect>
																<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"></path>
																<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"></path>
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Projects</span>
													<span class="d-block text-dark-50 font-size-lg">Pending Tasks</span>
												</a>
											</div>
											<!--end:Item-->
											<!--begin:Item-->
											<div class="col-6">
												<a href="#" class="d-block py-10 px-5 text-center bg-hover-light">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24"></polygon>
																<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Customers</span>
													<span class="d-block text-dark-50 font-size-lg">Latest cases</span>
												</a>
											</div>
											<!--end:Item-->
										</div>
										<!--end:Nav-->
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Quick Actions-->
								<!--begin::Cart-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" id="kt_quick_cart_toggle">
										<span class="svg-icon svg-icon-xl svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
													<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Cart-->
								<!--begin::Quick panel-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_panel_toggle">
										<span class="svg-icon svg-icon-xl svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Quick panel-->
								<!--begin::Chat-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-clean btn-lg mr-1" data-toggle="modal" data-target="#kt_chat_modal">
										<span class="svg-icon svg-icon-xl svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
													<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Chat-->
								<!--begin::Languages-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
											<img class="h-20px w-20px rounded-sm" src="assets/media/svg/flags/226-united-states.svg" alt="">
										</div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
										<!--begin::Nav-->
										<ul class="navi navi-hover py-4">
											<!--begin::Item-->
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="assets/media/svg/flags/226-united-states.svg" alt="">
													</span>
													<span class="navi-text">English</span>
												</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="navi-item active">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="assets/media/svg/flags/128-spain.svg" alt="">
													</span>
													<span class="navi-text">Spanish</span>
												</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="assets/media/svg/flags/162-germany.svg" alt="">
													</span>
													<span class="navi-text">German</span>
												</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="assets/media/svg/flags/063-japan.svg" alt="">
													</span>
													<span class="navi-text">Japanese</span>
												</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="assets/media/svg/flags/195-france.svg" alt="">
													</span>
													<span class="navi-text">French</span>
												</a>
											</li>
											<!--end::Item-->
										</ul>
										<!--end::Nav-->
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Languages-->
								<!--begin::User-->
								<div class="topbar-item">
									<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
										<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
										<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Sean</span>
										<span class="symbol symbol-35 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold">S</span>
										</span>
									</div>
								</div>
								<!--end::User-->
							</div>
							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline mr-5">
										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-2 mr-5">Mixed Widgets</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="" class="text-muted">Features</a>
											</li>
											<li class="breadcrumb-item">
												<a href="" class="text-muted">Widgets</a>
											</li>
											<li class="breadcrumb-item">
												<a href="" class="text-muted">Mixed</a>
											</li>
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Actions-->
									<a href="#" class="btn btn-light font-weight-bold btn-sm">Actions</a>
									<!--end::Actions-->
									<!--begin::Dropdown-->
									<div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
										<a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-success svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"></polygon>
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
														<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000"></path>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
										<div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
											<!--begin::Navigation-->
											<ul class="navi navi-hover">
												<li class="navi-header font-weight-bold py-4">
													<span class="font-size-lg">Choose Label:</span>
													<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
												</li>
												<li class="navi-separator mb-3 opacity-70"></li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-success">Customer</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-danger">Partner</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-warning">Suplier</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-primary">Member</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-dark">Staff</span>
														</span>
													</a>
												</li>
												<li class="navi-separator mt-3 opacity-70"></li>
												<li class="navi-footer py-4">
													<a class="btn btn-clean font-weight-bold btn-sm" href="#">
													<i class="ki ki-plus icon-sm"></i>Add new</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Row-->
								<div class="row">
									<div class="col-xl-4">
										<!--begin::Mixed Widget 1-->
										<div class="card card-custom bg-gray-100 gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 bg-danger py-5">
												<h3 class="card-title font-weight-bolder text-white">Sales Stat</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header pb-1">
																	<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Event</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
																		<span class="navi-text">Report</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Post</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
																		<span class="navi-text">File</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 position-relative overflow-hidden">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px; min-height: 200px;"><div id="apexchartsgrf272z4" class="apexcharts-canvas apexchartsgrf272z4 apexcharts-theme-light" style="width: 329px; height: 200px;"><svg id="SvgjsSvg5044" width="329" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5046" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs5045"><clipPath id="gridRectMaskgrf272z4"><rect id="SvgjsRect5049" width="336" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskgrf272z4"><rect id="SvgjsRect5050" width="333" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter5057" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood5058" flood-color="#d13647" flood-opacity="0.5" result="SvgjsFeFlood5058Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite5059" in="SvgjsFeFlood5058Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite5059Out"></feComposite><feOffset id="SvgjsFeOffset5060" dx="0" dy="5" result="SvgjsFeOffset5060Out" in="SvgjsFeComposite5059Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur5061" stdDeviation="3 " result="SvgjsFeGaussianBlur5061Out" in="SvgjsFeOffset5060Out"></feGaussianBlur><feMerge id="SvgjsFeMerge5062" result="SvgjsFeMerge5062Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode5063" in="SvgjsFeGaussianBlur5061Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode5064" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend5065" in="SourceGraphic" in2="SvgjsFeMerge5062Out" mode="normal" result="SvgjsFeBlend5065Out"></feBlend></filter><filter id="SvgjsFilter5067" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood5068" flood-color="#d13647" flood-opacity="0.5" result="SvgjsFeFlood5068Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite5069" in="SvgjsFeFlood5068Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite5069Out"></feComposite><feOffset id="SvgjsFeOffset5070" dx="0" dy="5" result="SvgjsFeOffset5070Out" in="SvgjsFeComposite5069Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur5071" stdDeviation="3 " result="SvgjsFeGaussianBlur5071Out" in="SvgjsFeOffset5070Out"></feGaussianBlur><feMerge id="SvgjsFeMerge5072" result="SvgjsFeMerge5072Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode5073" in="SvgjsFeGaussianBlur5071Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode5074" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend5075" in="SourceGraphic" in2="SvgjsFeMerge5072Out" mode="normal" result="SvgjsFeBlend5075Out"></feBlend></filter></defs><g id="SvgjsG5076" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG5077" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG5079" class="apexcharts-grid"><g id="SvgjsG5080" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine5082" x1="0" y1="0" x2="329" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5083" x1="0" y1="20" x2="329" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5084" x1="0" y1="40" x2="329" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5085" x1="0" y1="60" x2="329" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5086" x1="0" y1="80" x2="329" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5087" x1="0" y1="100" x2="329" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5088" x1="0" y1="120" x2="329" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5089" x1="0" y1="140" x2="329" y2="140" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5090" x1="0" y1="160" x2="329" y2="160" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5091" x1="0" y1="180" x2="329" y2="180" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5092" x1="0" y1="200" x2="329" y2="200" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG5081" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine5094" x1="0" y1="200" x2="329" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine5093" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG5052" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG5053" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath5056" d="M 0 200L 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100C 329 100 329 100 329 200M 329 100z" fill="transparent" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskgrf272z4)" filter="url(#SvgjsFilter5057)" pathTo="M 0 200L 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100C 329 100 329 100 329 200M 329 100z" pathFrom="M -1 200L -1 200L 54.833333333333336 200L 109.66666666666667 200L 164.5 200L 219.33333333333334 200L 274.1666666666667 200L 329 200"></path><path id="SvgjsPath5066" d="M 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100" fill="none" fill-opacity="1" stroke="#d13647" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskgrf272z4)" filter="url(#SvgjsFilter5067)" pathTo="M 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100" pathFrom="M -1 200L -1 200L 54.833333333333336 200L 109.66666666666667 200L 164.5 200L 219.33333333333334 200L 274.1666666666667 200L 329 200"></path><g id="SvgjsG5054" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle5100" r="0" cx="109.66666666666667" cy="120" class="apexcharts-marker w7xeo94zd no-pointer-events" stroke="#d13647" fill="#ffe2e5" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG5055" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine5095" x1="0" y1="0" x2="329" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5096" x1="0" y1="0" x2="329" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG5097" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG5098" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG5099" class="apexcharts-point-annotations"></g></g><g id="SvgjsG5078" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG5047" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 120.667px; top: 123px;"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;">Apr</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: transparent; display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Net Profit: </span><span class="apexcharts-tooltip-text-value">$32 thousands</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer mt-n25">
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
																		<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
																		<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
																		<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-warning font-weight-bold font-size-h6">Weekly Sales</a>
														</div>
														<div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">New Users</a>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
																		<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Item Orders</a>
														</div>
														<div class="col bg-light-success px-6 py-8 rounded-xl">
															<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Bug Reports</a>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 494px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 1-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 2-->
										<div class="card card-custom bg-gray-100 gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 bg-primary py-5">
												<h3 class="card-title font-weight-bolder text-white">Sales Stat</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header pb-1">
																	<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Event</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
																		<span class="navi-text">Report</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Post</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
																		<span class="navi-text">File</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 position-relative overflow-hidden">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_2_chart" class="card-rounded-bottom bg-primary" style="height: 200px; min-height: 200px;"><div id="apexchartsiswtcceb" class="apexcharts-canvas apexchartsiswtcceb apexcharts-theme-light" style="width: 329px; height: 200px;"><svg id="SvgjsSvg5102" width="329" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5104" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs5103"><clipPath id="gridRectMaskiswtcceb"><rect id="SvgjsRect5107" width="336" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskiswtcceb"><rect id="SvgjsRect5108" width="333" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter5115" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood5116" flood-color="#287ed7" flood-opacity="0.5" result="SvgjsFeFlood5116Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite5117" in="SvgjsFeFlood5116Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite5117Out"></feComposite><feOffset id="SvgjsFeOffset5118" dx="0" dy="5" result="SvgjsFeOffset5118Out" in="SvgjsFeComposite5117Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur5119" stdDeviation="3 " result="SvgjsFeGaussianBlur5119Out" in="SvgjsFeOffset5118Out"></feGaussianBlur><feMerge id="SvgjsFeMerge5120" result="SvgjsFeMerge5120Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode5121" in="SvgjsFeGaussianBlur5119Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode5122" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend5123" in="SourceGraphic" in2="SvgjsFeMerge5120Out" mode="normal" result="SvgjsFeBlend5123Out"></feBlend></filter><filter id="SvgjsFilter5125" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood5126" flood-color="#287ed7" flood-opacity="0.5" result="SvgjsFeFlood5126Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite5127" in="SvgjsFeFlood5126Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite5127Out"></feComposite><feOffset id="SvgjsFeOffset5128" dx="0" dy="5" result="SvgjsFeOffset5128Out" in="SvgjsFeComposite5127Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur5129" stdDeviation="3 " result="SvgjsFeGaussianBlur5129Out" in="SvgjsFeOffset5128Out"></feGaussianBlur><feMerge id="SvgjsFeMerge5130" result="SvgjsFeMerge5130Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode5131" in="SvgjsFeGaussianBlur5129Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode5132" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend5133" in="SourceGraphic" in2="SvgjsFeMerge5130Out" mode="normal" result="SvgjsFeBlend5133Out"></feBlend></filter></defs><g id="SvgjsG5134" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG5135" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG5137" class="apexcharts-grid"><g id="SvgjsG5138" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine5140" x1="0" y1="0" x2="329" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5141" x1="0" y1="20" x2="329" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5142" x1="0" y1="40" x2="329" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5143" x1="0" y1="60" x2="329" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5144" x1="0" y1="80" x2="329" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5145" x1="0" y1="100" x2="329" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5146" x1="0" y1="120" x2="329" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5147" x1="0" y1="140" x2="329" y2="140" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5148" x1="0" y1="160" x2="329" y2="160" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5149" x1="0" y1="180" x2="329" y2="180" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5150" x1="0" y1="200" x2="329" y2="200" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG5139" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine5152" x1="0" y1="200" x2="329" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine5151" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG5110" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG5111" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath5114" d="M 0 200L 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100C 329 100 329 100 329 200M 329 100z" fill="transparent" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskiswtcceb)" filter="url(#SvgjsFilter5115)" pathTo="M 0 200L 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100C 329 100 329 100 329 200M 329 100z" pathFrom="M -1 200L -1 200L 54.833333333333336 200L 109.66666666666667 200L 164.5 200L 219.33333333333334 200L 274.1666666666667 200L 329 200"></path><path id="SvgjsPath5124" d="M 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100" fill="none" fill-opacity="1" stroke="#287ed7" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskiswtcceb)" filter="url(#SvgjsFilter5125)" pathTo="M 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100" pathFrom="M -1 200L -1 200L 54.833333333333336 200L 109.66666666666667 200L 164.5 200L 219.33333333333334 200L 274.1666666666667 200L 329 200"></path><g id="SvgjsG5112" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle5158" r="0" cx="0" cy="125" class="apexcharts-marker whxo254x4 no-pointer-events" stroke="#287ed7" fill="#eee5ff" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG5113" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine5153" x1="0" y1="0" x2="329" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5154" x1="0" y1="0" x2="329" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG5155" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG5156" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG5157" class="apexcharts-point-annotations"></g></g><g id="SvgjsG5136" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG5105" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 11px; top: 128px;"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;">Feb</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: transparent; display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Net Profit: </span><span class="apexcharts-tooltip-text-value">$30 thousands</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: -21.5781px; top: 202px;"><div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px; min-width: 23.1709px;">Feb</div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer mt-n25">
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
																		<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
																		<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
																		<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-warning font-weight-bold font-size-h6">Weekly Sales</a>
														</div>
														<div class="col bg-white px-6 py-8 rounded-xl mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">New Users</a>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-white px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
																		<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Item Orders</a>
														</div>
														<div class="col bg-white px-6 py-8 rounded-xl">
															<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Bug Reports</a>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 494px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 2-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 3-->
										<div class="card card-custom bg-gray-100 gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 bg-dark py-5">
												<h3 class="card-title font-weight-bolder text-white">Sales Stat</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header pb-1">
																	<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Event</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
																		<span class="navi-text">Report</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Post</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
																		<span class="navi-text">File</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 position-relative overflow-hidden">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_3_chart" class="card-rounded-bottom bg-dark" style="height: 200px; min-height: 200px;"><div id="apexchartslvbamg0bf" class="apexcharts-canvas apexchartslvbamg0bf apexcharts-theme-light" style="width: 329px; height: 200px;"><svg id="SvgjsSvg5160" width="329" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5162" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs5161"><clipPath id="gridRectMasklvbamg0bf"><rect id="SvgjsRect5165" width="336" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMasklvbamg0bf"><rect id="SvgjsRect5166" width="333" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter5173" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood5174" flood-color="#ffffff" flood-opacity="0.3" result="SvgjsFeFlood5174Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite5175" in="SvgjsFeFlood5174Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite5175Out"></feComposite><feOffset id="SvgjsFeOffset5176" dx="0" dy="5" result="SvgjsFeOffset5176Out" in="SvgjsFeComposite5175Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur5177" stdDeviation="3 " result="SvgjsFeGaussianBlur5177Out" in="SvgjsFeOffset5176Out"></feGaussianBlur><feMerge id="SvgjsFeMerge5178" result="SvgjsFeMerge5178Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode5179" in="SvgjsFeGaussianBlur5177Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode5180" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend5181" in="SourceGraphic" in2="SvgjsFeMerge5178Out" mode="normal" result="SvgjsFeBlend5181Out"></feBlend></filter><filter id="SvgjsFilter5183" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood5184" flood-color="#ffffff" flood-opacity="0.3" result="SvgjsFeFlood5184Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite5185" in="SvgjsFeFlood5184Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite5185Out"></feComposite><feOffset id="SvgjsFeOffset5186" dx="0" dy="5" result="SvgjsFeOffset5186Out" in="SvgjsFeComposite5185Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur5187" stdDeviation="3 " result="SvgjsFeGaussianBlur5187Out" in="SvgjsFeOffset5186Out"></feGaussianBlur><feMerge id="SvgjsFeMerge5188" result="SvgjsFeMerge5188Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode5189" in="SvgjsFeGaussianBlur5187Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode5190" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend5191" in="SourceGraphic" in2="SvgjsFeMerge5188Out" mode="normal" result="SvgjsFeBlend5191Out"></feBlend></filter></defs><g id="SvgjsG5192" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG5193" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG5195" class="apexcharts-grid"><g id="SvgjsG5196" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine5198" x1="0" y1="0" x2="329" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5199" x1="0" y1="20" x2="329" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5200" x1="0" y1="40" x2="329" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5201" x1="0" y1="60" x2="329" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5202" x1="0" y1="80" x2="329" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5203" x1="0" y1="100" x2="329" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5204" x1="0" y1="120" x2="329" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5205" x1="0" y1="140" x2="329" y2="140" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5206" x1="0" y1="160" x2="329" y2="160" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5207" x1="0" y1="180" x2="329" y2="180" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5208" x1="0" y1="200" x2="329" y2="200" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG5197" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine5210" x1="0" y1="200" x2="329" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine5209" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG5168" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG5169" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath5172" d="M 0 200L 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100C 329 100 329 100 329 200M 329 100z" fill="transparent" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasklvbamg0bf)" filter="url(#SvgjsFilter5173)" pathTo="M 0 200L 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100C 329 100 329 100 329 200M 329 100z" pathFrom="M -1 200L -1 200L 54.833333333333336 200L 109.66666666666667 200L 164.5 200L 219.33333333333334 200L 274.1666666666667 200L 329 200"></path><path id="SvgjsPath5182" d="M 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100" fill="none" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasklvbamg0bf)" filter="url(#SvgjsFilter5183)" pathTo="M 0 125C 19.191666666666666 125 35.641666666666666 87.5 54.833333333333336 87.5C 74.025 87.5 90.47500000000001 120 109.66666666666667 120C 128.85833333333335 120 145.30833333333334 25 164.5 25C 183.69166666666666 25 200.14166666666668 100 219.33333333333334 100C 238.525 100 254.97500000000002 100 274.1666666666667 100C 293.35833333333335 100 309.80833333333334 100 329 100" pathFrom="M -1 200L -1 200L 54.833333333333336 200L 109.66666666666667 200L 164.5 200L 219.33333333333334 200L 274.1666666666667 200L 329 200"></path><g id="SvgjsG5170" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle5216" r="0" cx="0" cy="125" class="apexcharts-marker w6rjcvlbnj no-pointer-events" stroke="#ffffff" fill="#d6d6e0" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG5171" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine5211" x1="0" y1="0" x2="329" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5212" x1="0" y1="0" x2="329" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG5213" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG5214" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG5215" class="apexcharts-point-annotations"></g></g><g id="SvgjsG5194" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG5163" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 11px; top: 128px;"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;">Feb</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: transparent; display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Net Profit: </span><span class="apexcharts-tooltip-text-value">$30 thousands</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: -21.5781px; top: 202px;"><div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px; min-width: 23.1709px;">Feb</div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer mt-n25">
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-gray-500 d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
																		<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
																		<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
																		<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-dark font-weight-bold font-size-h6">Weekly Sales</a>
														</div>
														<div class="col bg-white px-6 py-8 rounded-xl mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-gray-500 d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-dark font-weight-bold font-size-h6 mt-2">New Users</a>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-white px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-gray-500 d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
																		<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-dark font-weight-bold font-size-h6 mt-2">Item Orders</a>
														</div>
														<div class="col bg-white px-6 py-8 rounded-xl">
															<span class="svg-icon svg-icon-3x svg-icon-gray-500 d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-dark font-weight-bold font-size-h6 mt-2">Bug Reports</a>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 494px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 3-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-xl-4">
										<!--begin::Mixed Widget 4-->
										<div class="card card-custom bg-radial-gradient-success gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header pb-1">
																	<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Event</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
																		<span class="navi-text">Report</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Post</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
																		<span class="navi-text">File</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column p-0" style="position: relative;">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_4_chart" style="height: 200px; min-height: 200px;"><div id="apexcharts6920efar" class="apexcharts-canvas apexcharts6920efar apexcharts-theme-light" style="width: 329px; height: 200px;"><svg id="SvgjsSvg5217" width="329" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5219" class="apexcharts-inner apexcharts-graphical" transform="translate(20, 0)"><defs id="SvgjsDefs5218"><linearGradient id="SvgjsLinearGradient5222" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop5223" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop5224" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop5225" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMask6920efar"><rect id="SvgjsRect5227" width="294" height="201" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMask6920efar"><rect id="SvgjsRect5228" width="293" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect5226" width="6.192857142857142" height="200" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient5222)" class="apexcharts-xcrosshairs" y2="200" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG5249" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG5250" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG5252" class="apexcharts-grid"><g id="SvgjsG5253" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine5255" x1="0" y1="0" x2="289" y2="0" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5256" x1="0" y1="20" x2="289" y2="20" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5257" x1="0" y1="40" x2="289" y2="40" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5258" x1="0" y1="60" x2="289" y2="60" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5259" x1="0" y1="80" x2="289" y2="80" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5260" x1="0" y1="100" x2="289" y2="100" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5261" x1="0" y1="120" x2="289" y2="120" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5262" x1="0" y1="140" x2="289" y2="140" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5263" x1="0" y1="160" x2="289" y2="160" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5264" x1="0" y1="180" x2="289" y2="180" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5265" x1="0" y1="200" x2="289" y2="200" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line></g><g id="SvgjsG5254" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine5267" x1="0" y1="200" x2="289" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine5266" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG5230" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG5231" class="apexcharts-series" rel="1" seriesName="NetxProfit" data:realIndex="0"><path id="SvgjsPath5233" d="M 14.45 200L 14.45 131.0482142857143Q 17.04642857142857 128.95178571428573 19.642857142857142 131.0482142857143L 19.642857142857142 131.0482142857143L 19.642857142857142 200L 19.642857142857142 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6920efar)" pathTo="M 14.45 200L 14.45 131.0482142857143Q 17.04642857142857 128.95178571428573 19.642857142857142 131.0482142857143L 19.642857142857142 131.0482142857143L 19.642857142857142 200L 19.642857142857142 200z" pathFrom="M 14.45 200L 14.45 200L 19.642857142857142 200L 19.642857142857142 200L 19.642857142857142 200L 14.45 200" cy="130" cx="55.23571428571428" j="0" val="35" barHeight="70" barWidth="6.192857142857142"></path><path id="SvgjsPath5234" d="M 55.73571428571428 200L 55.73571428571428 71.04821428571428Q 58.33214285714285 68.9517857142857 60.92857142857142 71.04821428571428L 60.92857142857142 71.04821428571428L 60.92857142857142 200L 60.92857142857142 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6920efar)" pathTo="M 55.73571428571428 200L 55.73571428571428 71.04821428571428Q 58.33214285714285 68.9517857142857 60.92857142857142 71.04821428571428L 60.92857142857142 71.04821428571428L 60.92857142857142 200L 60.92857142857142 200z" pathFrom="M 55.73571428571428 200L 55.73571428571428 200L 60.92857142857142 200L 60.92857142857142 200L 60.92857142857142 200L 55.73571428571428 200" cy="70" cx="96.52142857142857" j="1" val="65" barHeight="130" barWidth="6.192857142857142"></path><path id="SvgjsPath5235" d="M 97.02142857142857 200L 97.02142857142857 51.04821428571429Q 99.61785714285715 48.95178571428572 102.21428571428571 51.04821428571429L 102.21428571428571 51.04821428571429L 102.21428571428571 200L 102.21428571428571 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6920efar)" pathTo="M 97.02142857142857 200L 97.02142857142857 51.04821428571429Q 99.61785714285715 48.95178571428572 102.21428571428571 51.04821428571429L 102.21428571428571 51.04821428571429L 102.21428571428571 200L 102.21428571428571 200z" pathFrom="M 97.02142857142857 200L 97.02142857142857 200L 102.21428571428571 200L 102.21428571428571 200L 102.21428571428571 200L 97.02142857142857 200" cy="50" cx="137.80714285714285" j="2" val="75" barHeight="150" barWidth="6.192857142857142"></path><path id="SvgjsPath5236" d="M 138.30714285714285 200L 138.30714285714285 91.04821428571428Q 140.9035714285714 88.9517857142857 143.5 91.04821428571428L 143.5 91.04821428571428L 143.5 200L 143.5 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6920efar)" pathTo="M 138.30714285714285 200L 138.30714285714285 91.04821428571428Q 140.9035714285714 88.9517857142857 143.5 91.04821428571428L 143.5 91.04821428571428L 143.5 200L 143.5 200z" pathFrom="M 138.30714285714285 200L 138.30714285714285 200L 143.5 200L 143.5 200L 143.5 200L 138.30714285714285 200" cy="90" cx="179.09285714285713" j="3" val="55" barHeight="110" barWidth="6.192857142857142"></path><path id="SvgjsPath5237" d="M 179.59285714285713 200L 179.59285714285713 111.04821428571428Q 182.1892857142857 108.9517857142857 184.78571428571428 111.04821428571428L 184.78571428571428 111.04821428571428L 184.78571428571428 200L 184.78571428571428 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6920efar)" pathTo="M 179.59285714285713 200L 179.59285714285713 111.04821428571428Q 182.1892857142857 108.9517857142857 184.78571428571428 111.04821428571428L 184.78571428571428 111.04821428571428L 184.78571428571428 200L 184.78571428571428 200z" pathFrom="M 179.59285714285713 200L 179.59285714285713 200L 184.78571428571428 200L 184.78571428571428 200L 184.78571428571428 200L 179.59285714285713 200" cy="110" cx="220.3785714285714" j="4" val="45" barHeight="90" barWidth="6.192857142857142"></path><path id="SvgjsPath5238" d="M 220.8785714285714 200L 220.8785714285714 81.04821428571428Q 223.47499999999997 78.9517857142857 226.07142857142856 81.04821428571428L 226.07142857142856 81.04821428571428L 226.07142857142856 200L 226.07142857142856 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6920efar)" pathTo="M 220.8785714285714 200L 220.8785714285714 81.04821428571428Q 223.47499999999997 78.9517857142857 226.07142857142856 81.04821428571428L 226.07142857142856 81.04821428571428L 226.07142857142856 200L 226.07142857142856 200z" pathFrom="M 220.8785714285714 200L 220.8785714285714 200L 226.07142857142856 200L 226.07142857142856 200L 226.07142857142856 200L 220.8785714285714 200" cy="80" cx="261.6642857142857" j="5" val="60" barHeight="120" barWidth="6.192857142857142"></path><path id="SvgjsPath5239" d="M 262.1642857142857 200L 262.1642857142857 91.04821428571428Q 264.7607142857143 88.9517857142857 267.35714285714283 91.04821428571428L 267.35714285714283 91.04821428571428L 267.35714285714283 200L 267.35714285714283 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6920efar)" pathTo="M 262.1642857142857 200L 262.1642857142857 91.04821428571428Q 264.7607142857143 88.9517857142857 267.35714285714283 91.04821428571428L 267.35714285714283 91.04821428571428L 267.35714285714283 200L 267.35714285714283 200z" pathFrom="M 262.1642857142857 200L 262.1642857142857 200L 267.35714285714283 200L 267.35714285714283 200L 267.35714285714283 200L 262.1642857142857 200" cy="90" cx="302.95" j="6" val="55" barHeight="110" barWidth="6.192857142857142"></path></g><g id="SvgjsG5240" class="apexcharts-series" rel="2" seriesName="Revenue" data:realIndex="1"><path id="SvgjsPath5242" d="M 20.642857142857142 200L 20.642857142857142 121.04821428571428Q 23.239285714285714 118.9517857142857 25.835714285714285 121.04821428571428L 25.835714285714285 121.04821428571428L 25.835714285714285 200L 25.835714285714285 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6920efar)" pathTo="M 20.642857142857142 200L 20.642857142857142 121.04821428571428Q 23.239285714285714 118.9517857142857 25.835714285714285 121.04821428571428L 25.835714285714285 121.04821428571428L 25.835714285714285 200L 25.835714285714285 200z" pathFrom="M 20.642857142857142 200L 20.642857142857142 200L 25.835714285714285 200L 25.835714285714285 200L 25.835714285714285 200L 20.642857142857142 200" cy="120" cx="61.42857142857142" j="0" val="40" barHeight="80" barWidth="6.192857142857142"></path><path id="SvgjsPath5243" d="M 61.92857142857142 200L 61.92857142857142 61.04821428571429Q 64.52499999999999 58.95178571428572 67.12142857142857 61.04821428571429L 67.12142857142857 61.04821428571429L 67.12142857142857 200L 67.12142857142857 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6920efar)" pathTo="M 61.92857142857142 200L 61.92857142857142 61.04821428571429Q 64.52499999999999 58.95178571428572 67.12142857142857 61.04821428571429L 67.12142857142857 61.04821428571429L 67.12142857142857 200L 67.12142857142857 200z" pathFrom="M 61.92857142857142 200L 61.92857142857142 200L 67.12142857142857 200L 67.12142857142857 200L 67.12142857142857 200L 61.92857142857142 200" cy="60" cx="102.71428571428571" j="1" val="70" barHeight="140" barWidth="6.192857142857142"></path><path id="SvgjsPath5244" d="M 103.21428571428571 200L 103.21428571428571 41.04821428571429Q 105.81071428571428 38.95178571428572 108.40714285714284 41.04821428571429L 108.40714285714284 41.04821428571429L 108.40714285714284 200L 108.40714285714284 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6920efar)" pathTo="M 103.21428571428571 200L 103.21428571428571 41.04821428571429Q 105.81071428571428 38.95178571428572 108.40714285714284 41.04821428571429L 108.40714285714284 41.04821428571429L 108.40714285714284 200L 108.40714285714284 200z" pathFrom="M 103.21428571428571 200L 103.21428571428571 200L 108.40714285714284 200L 108.40714285714284 200L 108.40714285714284 200L 103.21428571428571 200" cy="40" cx="144" j="2" val="80" barHeight="160" barWidth="6.192857142857142"></path><path id="SvgjsPath5245" d="M 144.5 200L 144.5 81.04821428571428Q 147.09642857142856 78.9517857142857 149.69285714285715 81.04821428571428L 149.69285714285715 81.04821428571428L 149.69285714285715 200L 149.69285714285715 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6920efar)" pathTo="M 144.5 200L 144.5 81.04821428571428Q 147.09642857142856 78.9517857142857 149.69285714285715 81.04821428571428L 149.69285714285715 81.04821428571428L 149.69285714285715 200L 149.69285714285715 200z" pathFrom="M 144.5 200L 144.5 200L 149.69285714285715 200L 149.69285714285715 200L 149.69285714285715 200L 144.5 200" cy="80" cx="185.28571428571428" j="3" val="60" barHeight="120" barWidth="6.192857142857142"></path><path id="SvgjsPath5246" d="M 185.78571428571428 200L 185.78571428571428 101.04821428571428Q 188.38214285714284 98.9517857142857 190.97857142857143 101.04821428571428L 190.97857142857143 101.04821428571428L 190.97857142857143 200L 190.97857142857143 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6920efar)" pathTo="M 185.78571428571428 200L 185.78571428571428 101.04821428571428Q 188.38214285714284 98.9517857142857 190.97857142857143 101.04821428571428L 190.97857142857143 101.04821428571428L 190.97857142857143 200L 190.97857142857143 200z" pathFrom="M 185.78571428571428 200L 185.78571428571428 200L 190.97857142857143 200L 190.97857142857143 200L 190.97857142857143 200L 185.78571428571428 200" cy="100" cx="226.57142857142856" j="4" val="50" barHeight="100" barWidth="6.192857142857142"></path><path id="SvgjsPath5247" d="M 227.07142857142856 200L 227.07142857142856 71.04821428571428Q 229.66785714285712 68.9517857142857 232.2642857142857 71.04821428571428L 232.2642857142857 71.04821428571428L 232.2642857142857 200L 232.2642857142857 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6920efar)" pathTo="M 227.07142857142856 200L 227.07142857142856 71.04821428571428Q 229.66785714285712 68.9517857142857 232.2642857142857 71.04821428571428L 232.2642857142857 71.04821428571428L 232.2642857142857 200L 232.2642857142857 200z" pathFrom="M 227.07142857142856 200L 227.07142857142856 200L 232.2642857142857 200L 232.2642857142857 200L 232.2642857142857 200L 227.07142857142856 200" cy="70" cx="267.85714285714283" j="5" val="65" barHeight="130" barWidth="6.192857142857142"></path><path id="SvgjsPath5248" d="M 268.35714285714283 200L 268.35714285714283 81.04821428571428Q 270.9535714285714 78.9517857142857 273.54999999999995 81.04821428571428L 273.54999999999995 81.04821428571428L 273.54999999999995 200L 273.54999999999995 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6920efar)" pathTo="M 268.35714285714283 200L 268.35714285714283 81.04821428571428Q 270.9535714285714 78.9517857142857 273.54999999999995 81.04821428571428L 273.54999999999995 81.04821428571428L 273.54999999999995 200L 273.54999999999995 200z" pathFrom="M 268.35714285714283 200L 268.35714285714283 200L 273.54999999999995 200L 273.54999999999995 200L 273.54999999999995 200L 268.35714285714283 200" cy="80" cx="309.1428571428571" j="6" val="60" barHeight="120" barWidth="6.192857142857142"></path><g id="SvgjsG5241" class="apexcharts-datalabels" data:realIndex="1"></g></g><g id="SvgjsG5232" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine5268" x1="0" y1="0" x2="289" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5269" x1="0" y1="0" x2="289" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG5270" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG5271" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG5272" class="apexcharts-point-annotations"></g></g><g id="SvgjsG5251" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG5220" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer bg-white card-rounded flex-grow-1">
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col px-8 py-6 mr-8">
															<div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
															<div class="font-size-h4 font-weight-bolder">$650</div>
														</div>
														<div class="col px-8 py-6">
															<div class="font-size-sm text-muted font-weight-bold">Commission</div>
															<div class="font-size-h4 font-weight-bolder">$233,600</div>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col px-8 py-6 mr-8">
															<div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
															<div class="font-size-h4 font-weight-bolder">$29,004</div>
														</div>
														<div class="col px-8 py-6">
															<div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
															<div class="font-size-h4 font-weight-bolder">$1,480,00</div>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 490px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 4-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 5-->
										<div class="card card-custom bg-radial-gradient-primary gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column p-0" style="position: relative;">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_5_chart" style="height: 200px; min-height: 200px;"><div id="apexchartsqpksoyfx" class="apexcharts-canvas apexchartsqpksoyfx apexcharts-theme-light" style="width: 329px; height: 200px;"><svg id="SvgjsSvg5273" width="329" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5275" class="apexcharts-inner apexcharts-graphical" transform="translate(20, 0)"><defs id="SvgjsDefs5274"><linearGradient id="SvgjsLinearGradient5278" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop5279" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop5280" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop5281" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskqpksoyfx"><rect id="SvgjsRect5283" width="294" height="201" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskqpksoyfx"><rect id="SvgjsRect5284" width="293" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect5282" width="6.192857142857142" height="200" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient5278)" class="apexcharts-xcrosshairs" y2="200" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG5305" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG5306" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG5308" class="apexcharts-grid"><g id="SvgjsG5309" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine5311" x1="0" y1="0" x2="289" y2="0" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5312" x1="0" y1="20" x2="289" y2="20" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5313" x1="0" y1="40" x2="289" y2="40" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5314" x1="0" y1="60" x2="289" y2="60" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5315" x1="0" y1="80" x2="289" y2="80" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5316" x1="0" y1="100" x2="289" y2="100" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5317" x1="0" y1="120" x2="289" y2="120" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5318" x1="0" y1="140" x2="289" y2="140" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5319" x1="0" y1="160" x2="289" y2="160" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5320" x1="0" y1="180" x2="289" y2="180" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5321" x1="0" y1="200" x2="289" y2="200" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line></g><g id="SvgjsG5310" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine5323" x1="0" y1="200" x2="289" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine5322" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG5286" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG5287" class="apexcharts-series" rel="1" seriesName="NetxProfit" data:realIndex="0"><path id="SvgjsPath5289" d="M 14.45 200L 14.45 131.0482142857143Q 17.04642857142857 128.95178571428573 19.642857142857142 131.0482142857143L 19.642857142857142 131.0482142857143L 19.642857142857142 200L 19.642857142857142 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 14.45 200L 14.45 131.0482142857143Q 17.04642857142857 128.95178571428573 19.642857142857142 131.0482142857143L 19.642857142857142 131.0482142857143L 19.642857142857142 200L 19.642857142857142 200z" pathFrom="M 14.45 200L 14.45 200L 19.642857142857142 200L 19.642857142857142 200L 19.642857142857142 200L 14.45 200" cy="130" cx="55.23571428571428" j="0" val="35" barHeight="70" barWidth="6.192857142857142"></path><path id="SvgjsPath5290" d="M 55.73571428571428 200L 55.73571428571428 71.04821428571428Q 58.33214285714285 68.9517857142857 60.92857142857142 71.04821428571428L 60.92857142857142 71.04821428571428L 60.92857142857142 200L 60.92857142857142 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 55.73571428571428 200L 55.73571428571428 71.04821428571428Q 58.33214285714285 68.9517857142857 60.92857142857142 71.04821428571428L 60.92857142857142 71.04821428571428L 60.92857142857142 200L 60.92857142857142 200z" pathFrom="M 55.73571428571428 200L 55.73571428571428 200L 60.92857142857142 200L 60.92857142857142 200L 60.92857142857142 200L 55.73571428571428 200" cy="70" cx="96.52142857142857" j="1" val="65" barHeight="130" barWidth="6.192857142857142"></path><path id="SvgjsPath5291" d="M 97.02142857142857 200L 97.02142857142857 51.04821428571429Q 99.61785714285715 48.95178571428572 102.21428571428571 51.04821428571429L 102.21428571428571 51.04821428571429L 102.21428571428571 200L 102.21428571428571 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 97.02142857142857 200L 97.02142857142857 51.04821428571429Q 99.61785714285715 48.95178571428572 102.21428571428571 51.04821428571429L 102.21428571428571 51.04821428571429L 102.21428571428571 200L 102.21428571428571 200z" pathFrom="M 97.02142857142857 200L 97.02142857142857 200L 102.21428571428571 200L 102.21428571428571 200L 102.21428571428571 200L 97.02142857142857 200" cy="50" cx="137.80714285714285" j="2" val="75" barHeight="150" barWidth="6.192857142857142"></path><path id="SvgjsPath5292" d="M 138.30714285714285 200L 138.30714285714285 91.04821428571428Q 140.9035714285714 88.9517857142857 143.5 91.04821428571428L 143.5 91.04821428571428L 143.5 200L 143.5 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 138.30714285714285 200L 138.30714285714285 91.04821428571428Q 140.9035714285714 88.9517857142857 143.5 91.04821428571428L 143.5 91.04821428571428L 143.5 200L 143.5 200z" pathFrom="M 138.30714285714285 200L 138.30714285714285 200L 143.5 200L 143.5 200L 143.5 200L 138.30714285714285 200" cy="90" cx="179.09285714285713" j="3" val="55" barHeight="110" barWidth="6.192857142857142"></path><path id="SvgjsPath5293" d="M 179.59285714285713 200L 179.59285714285713 111.04821428571428Q 182.1892857142857 108.9517857142857 184.78571428571428 111.04821428571428L 184.78571428571428 111.04821428571428L 184.78571428571428 200L 184.78571428571428 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 179.59285714285713 200L 179.59285714285713 111.04821428571428Q 182.1892857142857 108.9517857142857 184.78571428571428 111.04821428571428L 184.78571428571428 111.04821428571428L 184.78571428571428 200L 184.78571428571428 200z" pathFrom="M 179.59285714285713 200L 179.59285714285713 200L 184.78571428571428 200L 184.78571428571428 200L 184.78571428571428 200L 179.59285714285713 200" cy="110" cx="220.3785714285714" j="4" val="45" barHeight="90" barWidth="6.192857142857142"></path><path id="SvgjsPath5294" d="M 220.8785714285714 200L 220.8785714285714 81.04821428571428Q 223.47499999999997 78.9517857142857 226.07142857142856 81.04821428571428L 226.07142857142856 81.04821428571428L 226.07142857142856 200L 226.07142857142856 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 220.8785714285714 200L 220.8785714285714 81.04821428571428Q 223.47499999999997 78.9517857142857 226.07142857142856 81.04821428571428L 226.07142857142856 81.04821428571428L 226.07142857142856 200L 226.07142857142856 200z" pathFrom="M 220.8785714285714 200L 220.8785714285714 200L 226.07142857142856 200L 226.07142857142856 200L 226.07142857142856 200L 220.8785714285714 200" cy="80" cx="261.6642857142857" j="5" val="60" barHeight="120" barWidth="6.192857142857142"></path><path id="SvgjsPath5295" d="M 262.1642857142857 200L 262.1642857142857 91.04821428571428Q 264.7607142857143 88.9517857142857 267.35714285714283 91.04821428571428L 267.35714285714283 91.04821428571428L 267.35714285714283 200L 267.35714285714283 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 262.1642857142857 200L 262.1642857142857 91.04821428571428Q 264.7607142857143 88.9517857142857 267.35714285714283 91.04821428571428L 267.35714285714283 91.04821428571428L 267.35714285714283 200L 267.35714285714283 200z" pathFrom="M 262.1642857142857 200L 262.1642857142857 200L 267.35714285714283 200L 267.35714285714283 200L 267.35714285714283 200L 262.1642857142857 200" cy="90" cx="302.95" j="6" val="55" barHeight="110" barWidth="6.192857142857142"></path></g><g id="SvgjsG5296" class="apexcharts-series" rel="2" seriesName="Revenue" data:realIndex="1"><path id="SvgjsPath5298" d="M 20.642857142857142 200L 20.642857142857142 121.04821428571428Q 23.239285714285714 118.9517857142857 25.835714285714285 121.04821428571428L 25.835714285714285 121.04821428571428L 25.835714285714285 200L 25.835714285714285 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 20.642857142857142 200L 20.642857142857142 121.04821428571428Q 23.239285714285714 118.9517857142857 25.835714285714285 121.04821428571428L 25.835714285714285 121.04821428571428L 25.835714285714285 200L 25.835714285714285 200z" pathFrom="M 20.642857142857142 200L 20.642857142857142 200L 25.835714285714285 200L 25.835714285714285 200L 25.835714285714285 200L 20.642857142857142 200" cy="120" cx="61.42857142857142" j="0" val="40" barHeight="80" barWidth="6.192857142857142"></path><path id="SvgjsPath5299" d="M 61.92857142857142 200L 61.92857142857142 61.04821428571429Q 64.52499999999999 58.95178571428572 67.12142857142857 61.04821428571429L 67.12142857142857 61.04821428571429L 67.12142857142857 200L 67.12142857142857 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 61.92857142857142 200L 61.92857142857142 61.04821428571429Q 64.52499999999999 58.95178571428572 67.12142857142857 61.04821428571429L 67.12142857142857 61.04821428571429L 67.12142857142857 200L 67.12142857142857 200z" pathFrom="M 61.92857142857142 200L 61.92857142857142 200L 67.12142857142857 200L 67.12142857142857 200L 67.12142857142857 200L 61.92857142857142 200" cy="60" cx="102.71428571428571" j="1" val="70" barHeight="140" barWidth="6.192857142857142"></path><path id="SvgjsPath5300" d="M 103.21428571428571 200L 103.21428571428571 41.04821428571429Q 105.81071428571428 38.95178571428572 108.40714285714284 41.04821428571429L 108.40714285714284 41.04821428571429L 108.40714285714284 200L 108.40714285714284 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 103.21428571428571 200L 103.21428571428571 41.04821428571429Q 105.81071428571428 38.95178571428572 108.40714285714284 41.04821428571429L 108.40714285714284 41.04821428571429L 108.40714285714284 200L 108.40714285714284 200z" pathFrom="M 103.21428571428571 200L 103.21428571428571 200L 108.40714285714284 200L 108.40714285714284 200L 108.40714285714284 200L 103.21428571428571 200" cy="40" cx="144" j="2" val="80" barHeight="160" barWidth="6.192857142857142"></path><path id="SvgjsPath5301" d="M 144.5 200L 144.5 81.04821428571428Q 147.09642857142856 78.9517857142857 149.69285714285715 81.04821428571428L 149.69285714285715 81.04821428571428L 149.69285714285715 200L 149.69285714285715 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 144.5 200L 144.5 81.04821428571428Q 147.09642857142856 78.9517857142857 149.69285714285715 81.04821428571428L 149.69285714285715 81.04821428571428L 149.69285714285715 200L 149.69285714285715 200z" pathFrom="M 144.5 200L 144.5 200L 149.69285714285715 200L 149.69285714285715 200L 149.69285714285715 200L 144.5 200" cy="80" cx="185.28571428571428" j="3" val="60" barHeight="120" barWidth="6.192857142857142"></path><path id="SvgjsPath5302" d="M 185.78571428571428 200L 185.78571428571428 101.04821428571428Q 188.38214285714284 98.9517857142857 190.97857142857143 101.04821428571428L 190.97857142857143 101.04821428571428L 190.97857142857143 200L 190.97857142857143 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 185.78571428571428 200L 185.78571428571428 101.04821428571428Q 188.38214285714284 98.9517857142857 190.97857142857143 101.04821428571428L 190.97857142857143 101.04821428571428L 190.97857142857143 200L 190.97857142857143 200z" pathFrom="M 185.78571428571428 200L 185.78571428571428 200L 190.97857142857143 200L 190.97857142857143 200L 190.97857142857143 200L 185.78571428571428 200" cy="100" cx="226.57142857142856" j="4" val="50" barHeight="100" barWidth="6.192857142857142"></path><path id="SvgjsPath5303" d="M 227.07142857142856 200L 227.07142857142856 71.04821428571428Q 229.66785714285712 68.9517857142857 232.2642857142857 71.04821428571428L 232.2642857142857 71.04821428571428L 232.2642857142857 200L 232.2642857142857 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 227.07142857142856 200L 227.07142857142856 71.04821428571428Q 229.66785714285712 68.9517857142857 232.2642857142857 71.04821428571428L 232.2642857142857 71.04821428571428L 232.2642857142857 200L 232.2642857142857 200z" pathFrom="M 227.07142857142856 200L 227.07142857142856 200L 232.2642857142857 200L 232.2642857142857 200L 232.2642857142857 200L 227.07142857142856 200" cy="70" cx="267.85714285714283" j="5" val="65" barHeight="130" barWidth="6.192857142857142"></path><path id="SvgjsPath5304" d="M 268.35714285714283 200L 268.35714285714283 81.04821428571428Q 270.9535714285714 78.9517857142857 273.54999999999995 81.04821428571428L 273.54999999999995 81.04821428571428L 273.54999999999995 200L 273.54999999999995 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqpksoyfx)" pathTo="M 268.35714285714283 200L 268.35714285714283 81.04821428571428Q 270.9535714285714 78.9517857142857 273.54999999999995 81.04821428571428L 273.54999999999995 81.04821428571428L 273.54999999999995 200L 273.54999999999995 200z" pathFrom="M 268.35714285714283 200L 268.35714285714283 200L 273.54999999999995 200L 273.54999999999995 200L 273.54999999999995 200L 268.35714285714283 200" cy="80" cx="309.1428571428571" j="6" val="60" barHeight="120" barWidth="6.192857142857142"></path><g id="SvgjsG5297" class="apexcharts-datalabels" data:realIndex="1"></g></g><g id="SvgjsG5288" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine5324" x1="0" y1="0" x2="289" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5325" x1="0" y1="0" x2="289" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG5326" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG5327" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG5328" class="apexcharts-point-annotations"></g></g><g id="SvgjsG5307" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG5276" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer bg-white card-rounded flex-grow-1">
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col px-8 py-6 mr-8">
															<div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
															<div class="font-size-h4 font-weight-bolder">$650</div>
														</div>
														<div class="col px-8 py-6">
															<div class="font-size-sm text-muted font-weight-bold">Commission</div>
															<div class="font-size-h4 font-weight-bolder">$233,600</div>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col px-8 py-6 mr-8">
															<div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
															<div class="font-size-h4 font-weight-bolder">$29,004</div>
														</div>
														<div class="col px-8 py-6">
															<div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
															<div class="font-size-h4 font-weight-bolder">$1,480,00</div>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 490px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 5-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 4-->
										<div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header pb-1">
																	<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Event</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
																		<span class="navi-text">Report</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Post</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
																		<span class="navi-text">File</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column p-0" style="position: relative;">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_6_chart" style="height: 200px; min-height: 200px;"><div id="apexchartsiqjqij1i" class="apexcharts-canvas apexchartsiqjqij1i apexcharts-theme-light" style="width: 329px; height: 200px;"><svg id="SvgjsSvg5329" width="329" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5331" class="apexcharts-inner apexcharts-graphical" transform="translate(20, 0)"><defs id="SvgjsDefs5330"><linearGradient id="SvgjsLinearGradient5334" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop5335" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop5336" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop5337" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskiqjqij1i"><rect id="SvgjsRect5339" width="294" height="201" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskiqjqij1i"><rect id="SvgjsRect5340" width="293" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect5338" width="6.192857142857142" height="200" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient5334)" class="apexcharts-xcrosshairs" y2="200" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG5361" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG5362" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG5364" class="apexcharts-grid"><g id="SvgjsG5365" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine5367" x1="0" y1="0" x2="289" y2="0" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5368" x1="0" y1="20" x2="289" y2="20" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5369" x1="0" y1="40" x2="289" y2="40" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5370" x1="0" y1="60" x2="289" y2="60" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5371" x1="0" y1="80" x2="289" y2="80" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5372" x1="0" y1="100" x2="289" y2="100" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5373" x1="0" y1="120" x2="289" y2="120" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5374" x1="0" y1="140" x2="289" y2="140" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5375" x1="0" y1="160" x2="289" y2="160" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5376" x1="0" y1="180" x2="289" y2="180" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line><line id="SvgjsLine5377" x1="0" y1="200" x2="289" y2="200" stroke="#ecf0f3" stroke-dasharray="4" class="apexcharts-gridline"></line></g><g id="SvgjsG5366" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine5379" x1="0" y1="200" x2="289" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine5378" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG5342" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG5343" class="apexcharts-series" rel="1" seriesName="NetxProfit" data:realIndex="0"><path id="SvgjsPath5345" d="M 14.45 200L 14.45 131.0482142857143Q 17.04642857142857 128.95178571428573 19.642857142857142 131.0482142857143L 19.642857142857142 131.0482142857143L 19.642857142857142 200L 19.642857142857142 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 14.45 200L 14.45 131.0482142857143Q 17.04642857142857 128.95178571428573 19.642857142857142 131.0482142857143L 19.642857142857142 131.0482142857143L 19.642857142857142 200L 19.642857142857142 200z" pathFrom="M 14.45 200L 14.45 200L 19.642857142857142 200L 19.642857142857142 200L 19.642857142857142 200L 14.45 200" cy="130" cx="55.23571428571428" j="0" val="35" barHeight="70" barWidth="6.192857142857142"></path><path id="SvgjsPath5346" d="M 55.73571428571428 200L 55.73571428571428 71.04821428571428Q 58.33214285714285 68.9517857142857 60.92857142857142 71.04821428571428L 60.92857142857142 71.04821428571428L 60.92857142857142 200L 60.92857142857142 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 55.73571428571428 200L 55.73571428571428 71.04821428571428Q 58.33214285714285 68.9517857142857 60.92857142857142 71.04821428571428L 60.92857142857142 71.04821428571428L 60.92857142857142 200L 60.92857142857142 200z" pathFrom="M 55.73571428571428 200L 55.73571428571428 200L 60.92857142857142 200L 60.92857142857142 200L 60.92857142857142 200L 55.73571428571428 200" cy="70" cx="96.52142857142857" j="1" val="65" barHeight="130" barWidth="6.192857142857142"></path><path id="SvgjsPath5347" d="M 97.02142857142857 200L 97.02142857142857 51.04821428571429Q 99.61785714285715 48.95178571428572 102.21428571428571 51.04821428571429L 102.21428571428571 51.04821428571429L 102.21428571428571 200L 102.21428571428571 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 97.02142857142857 200L 97.02142857142857 51.04821428571429Q 99.61785714285715 48.95178571428572 102.21428571428571 51.04821428571429L 102.21428571428571 51.04821428571429L 102.21428571428571 200L 102.21428571428571 200z" pathFrom="M 97.02142857142857 200L 97.02142857142857 200L 102.21428571428571 200L 102.21428571428571 200L 102.21428571428571 200L 97.02142857142857 200" cy="50" cx="137.80714285714285" j="2" val="75" barHeight="150" barWidth="6.192857142857142"></path><path id="SvgjsPath5348" d="M 138.30714285714285 200L 138.30714285714285 91.04821428571428Q 140.9035714285714 88.9517857142857 143.5 91.04821428571428L 143.5 91.04821428571428L 143.5 200L 143.5 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 138.30714285714285 200L 138.30714285714285 91.04821428571428Q 140.9035714285714 88.9517857142857 143.5 91.04821428571428L 143.5 91.04821428571428L 143.5 200L 143.5 200z" pathFrom="M 138.30714285714285 200L 138.30714285714285 200L 143.5 200L 143.5 200L 143.5 200L 138.30714285714285 200" cy="90" cx="179.09285714285713" j="3" val="55" barHeight="110" barWidth="6.192857142857142"></path><path id="SvgjsPath5349" d="M 179.59285714285713 200L 179.59285714285713 111.04821428571428Q 182.1892857142857 108.9517857142857 184.78571428571428 111.04821428571428L 184.78571428571428 111.04821428571428L 184.78571428571428 200L 184.78571428571428 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 179.59285714285713 200L 179.59285714285713 111.04821428571428Q 182.1892857142857 108.9517857142857 184.78571428571428 111.04821428571428L 184.78571428571428 111.04821428571428L 184.78571428571428 200L 184.78571428571428 200z" pathFrom="M 179.59285714285713 200L 179.59285714285713 200L 184.78571428571428 200L 184.78571428571428 200L 184.78571428571428 200L 179.59285714285713 200" cy="110" cx="220.3785714285714" j="4" val="45" barHeight="90" barWidth="6.192857142857142"></path><path id="SvgjsPath5350" d="M 220.8785714285714 200L 220.8785714285714 81.04821428571428Q 223.47499999999997 78.9517857142857 226.07142857142856 81.04821428571428L 226.07142857142856 81.04821428571428L 226.07142857142856 200L 226.07142857142856 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 220.8785714285714 200L 220.8785714285714 81.04821428571428Q 223.47499999999997 78.9517857142857 226.07142857142856 81.04821428571428L 226.07142857142856 81.04821428571428L 226.07142857142856 200L 226.07142857142856 200z" pathFrom="M 220.8785714285714 200L 220.8785714285714 200L 226.07142857142856 200L 226.07142857142856 200L 226.07142857142856 200L 220.8785714285714 200" cy="80" cx="261.6642857142857" j="5" val="60" barHeight="120" barWidth="6.192857142857142"></path><path id="SvgjsPath5351" d="M 262.1642857142857 200L 262.1642857142857 91.04821428571428Q 264.7607142857143 88.9517857142857 267.35714285714283 91.04821428571428L 267.35714285714283 91.04821428571428L 267.35714285714283 200L 267.35714285714283 200z" fill="rgba(255,255,255,0.25)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 262.1642857142857 200L 262.1642857142857 91.04821428571428Q 264.7607142857143 88.9517857142857 267.35714285714283 91.04821428571428L 267.35714285714283 91.04821428571428L 267.35714285714283 200L 267.35714285714283 200z" pathFrom="M 262.1642857142857 200L 262.1642857142857 200L 267.35714285714283 200L 267.35714285714283 200L 267.35714285714283 200L 262.1642857142857 200" cy="90" cx="302.95" j="6" val="55" barHeight="110" barWidth="6.192857142857142"></path></g><g id="SvgjsG5352" class="apexcharts-series" rel="2" seriesName="Revenue" data:realIndex="1"><path id="SvgjsPath5354" d="M 20.642857142857142 200L 20.642857142857142 121.04821428571428Q 23.239285714285714 118.9517857142857 25.835714285714285 121.04821428571428L 25.835714285714285 121.04821428571428L 25.835714285714285 200L 25.835714285714285 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 20.642857142857142 200L 20.642857142857142 121.04821428571428Q 23.239285714285714 118.9517857142857 25.835714285714285 121.04821428571428L 25.835714285714285 121.04821428571428L 25.835714285714285 200L 25.835714285714285 200z" pathFrom="M 20.642857142857142 200L 20.642857142857142 200L 25.835714285714285 200L 25.835714285714285 200L 25.835714285714285 200L 20.642857142857142 200" cy="120" cx="61.42857142857142" j="0" val="40" barHeight="80" barWidth="6.192857142857142"></path><path id="SvgjsPath5355" d="M 61.92857142857142 200L 61.92857142857142 61.04821428571429Q 64.52499999999999 58.95178571428572 67.12142857142857 61.04821428571429L 67.12142857142857 61.04821428571429L 67.12142857142857 200L 67.12142857142857 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 61.92857142857142 200L 61.92857142857142 61.04821428571429Q 64.52499999999999 58.95178571428572 67.12142857142857 61.04821428571429L 67.12142857142857 61.04821428571429L 67.12142857142857 200L 67.12142857142857 200z" pathFrom="M 61.92857142857142 200L 61.92857142857142 200L 67.12142857142857 200L 67.12142857142857 200L 67.12142857142857 200L 61.92857142857142 200" cy="60" cx="102.71428571428571" j="1" val="70" barHeight="140" barWidth="6.192857142857142"></path><path id="SvgjsPath5356" d="M 103.21428571428571 200L 103.21428571428571 41.04821428571429Q 105.81071428571428 38.95178571428572 108.40714285714284 41.04821428571429L 108.40714285714284 41.04821428571429L 108.40714285714284 200L 108.40714285714284 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 103.21428571428571 200L 103.21428571428571 41.04821428571429Q 105.81071428571428 38.95178571428572 108.40714285714284 41.04821428571429L 108.40714285714284 41.04821428571429L 108.40714285714284 200L 108.40714285714284 200z" pathFrom="M 103.21428571428571 200L 103.21428571428571 200L 108.40714285714284 200L 108.40714285714284 200L 108.40714285714284 200L 103.21428571428571 200" cy="40" cx="144" j="2" val="80" barHeight="160" barWidth="6.192857142857142"></path><path id="SvgjsPath5357" d="M 144.5 200L 144.5 81.04821428571428Q 147.09642857142856 78.9517857142857 149.69285714285715 81.04821428571428L 149.69285714285715 81.04821428571428L 149.69285714285715 200L 149.69285714285715 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 144.5 200L 144.5 81.04821428571428Q 147.09642857142856 78.9517857142857 149.69285714285715 81.04821428571428L 149.69285714285715 81.04821428571428L 149.69285714285715 200L 149.69285714285715 200z" pathFrom="M 144.5 200L 144.5 200L 149.69285714285715 200L 149.69285714285715 200L 149.69285714285715 200L 144.5 200" cy="80" cx="185.28571428571428" j="3" val="60" barHeight="120" barWidth="6.192857142857142"></path><path id="SvgjsPath5358" d="M 185.78571428571428 200L 185.78571428571428 101.04821428571428Q 188.38214285714284 98.9517857142857 190.97857142857143 101.04821428571428L 190.97857142857143 101.04821428571428L 190.97857142857143 200L 190.97857142857143 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 185.78571428571428 200L 185.78571428571428 101.04821428571428Q 188.38214285714284 98.9517857142857 190.97857142857143 101.04821428571428L 190.97857142857143 101.04821428571428L 190.97857142857143 200L 190.97857142857143 200z" pathFrom="M 185.78571428571428 200L 185.78571428571428 200L 190.97857142857143 200L 190.97857142857143 200L 190.97857142857143 200L 185.78571428571428 200" cy="100" cx="226.57142857142856" j="4" val="50" barHeight="100" barWidth="6.192857142857142"></path><path id="SvgjsPath5359" d="M 227.07142857142856 200L 227.07142857142856 71.04821428571428Q 229.66785714285712 68.9517857142857 232.2642857142857 71.04821428571428L 232.2642857142857 71.04821428571428L 232.2642857142857 200L 232.2642857142857 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 227.07142857142856 200L 227.07142857142856 71.04821428571428Q 229.66785714285712 68.9517857142857 232.2642857142857 71.04821428571428L 232.2642857142857 71.04821428571428L 232.2642857142857 200L 232.2642857142857 200z" pathFrom="M 227.07142857142856 200L 227.07142857142856 200L 232.2642857142857 200L 232.2642857142857 200L 232.2642857142857 200L 227.07142857142856 200" cy="70" cx="267.85714285714283" j="5" val="65" barHeight="130" barWidth="6.192857142857142"></path><path id="SvgjsPath5360" d="M 268.35714285714283 200L 268.35714285714283 81.04821428571428Q 270.9535714285714 78.9517857142857 273.54999999999995 81.04821428571428L 273.54999999999995 81.04821428571428L 273.54999999999995 200L 273.54999999999995 200z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="1" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskiqjqij1i)" pathTo="M 268.35714285714283 200L 268.35714285714283 81.04821428571428Q 270.9535714285714 78.9517857142857 273.54999999999995 81.04821428571428L 273.54999999999995 81.04821428571428L 273.54999999999995 200L 273.54999999999995 200z" pathFrom="M 268.35714285714283 200L 268.35714285714283 200L 273.54999999999995 200L 273.54999999999995 200L 273.54999999999995 200L 268.35714285714283 200" cy="80" cx="309.1428571428571" j="6" val="60" barHeight="120" barWidth="6.192857142857142"></path><g id="SvgjsG5353" class="apexcharts-datalabels" data:realIndex="1"></g></g><g id="SvgjsG5344" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine5380" x1="0" y1="0" x2="289" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5381" x1="0" y1="0" x2="289" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG5382" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG5383" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG5384" class="apexcharts-point-annotations"></g></g><g id="SvgjsG5363" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG5332" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer bg-white card-rounded flex-grow-1">
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col px-8 py-6 mr-8">
															<div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
															<div class="font-size-h4 font-weight-bolder">$650</div>
														</div>
														<div class="col px-8 py-6">
															<div class="font-size-sm text-muted font-weight-bold">Commission</div>
															<div class="font-size-h4 font-weight-bolder">$233,600</div>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col px-8 py-6 mr-8">
															<div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
															<div class="font-size-h4 font-weight-bolder">$29,004</div>
														</div>
														<div class="col px-8 py-6">
															<div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
															<div class="font-size-h4 font-weight-bolder">$1,480,00</div>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 490px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 4-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-xl-4">
										<!--begin::Mixed Widget 7-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Body-->
											<div class="card-body">
												<div class="d-flex flex-wrap align-items-center py-1">
													<!--begin:Pic-->
													<div class="symbol symbol-80 symbol-light-danger mr-5">
														<span class="symbol-label">
															<img src="assets/media/svg/misc/008-infography.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
													<!--end:Pic-->
													<!--begin:Title-->
													<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
														<a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-h5">Monthly Subscription
														<br>Based SaaS</a>
														<span class="text-muted font-weight-bold font-size-lg">Due: 27 Apr 2020</span>
													</div>
													<!--end:Title-->
													<!--begin:Stats-->
													<div class="d-flex flex-column w-100 mt-12">
														<span class="text-dark mr-2 font-size-lg font-weight-bolder pb-3">Progress</span>
														<div class="progress progress-xs w-100">
															<div class="progress-bar bg-danger" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
													<!--end:Stats-->
													<!--begin:Team-->
													<div class="d-flex flex-column mt-10">
														<div class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">Team</div>
														<div class="d-flex">
															<a href="#" class="symbol symbol-50 symbol-light-danger mr-3">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<a href="#" class="symbol symbol-50 symbol-light-danger mr-3">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/028-girl-16.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<a href="#" class="symbol symbol-50 symbol-light-danger mr-3">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/024-boy-9.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<a href="#" class="symbol symbol-50 symbol-light-danger">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/005-girl-2.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
														</div>
													</div>
													<!--end:Team-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 7-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 8-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Card body-->
											<div class="card-body">
												<div class="d-flex flex-wrap align-items-center py-1">
													<!--begin::Pic-->
													<div class="symbol symbol-80 symbol-light-success mr-5">
														<span class="symbol-label">
															<img src="assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
													<!--end::Pic-->
													<!--begin::Title-->
													<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
														<a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-h5">Monthly Subscription
														<br>Based SaaS</a>
														<span class="text-muted font-weight-bold font-size-lg">Due: 27 Apr 2020</span>
													</div>
													<!--end::Title-->
													<!--begin::Stats-->
													<div class="d-flex flex-column w-100 mt-12">
														<span class="text-dark mr-2 font-size-lg font-weight-bolder pb-3">Progress</span>
														<div class="progress progress-xs w-100">
															<div class="progress-bar bg-success" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
													<!--end::Stats-->
													<!--begin::Team-->
													<div class="d-flex flex-column mt-10">
														<span class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">Team</span>
														<div class="d-flex">
															<!--begin::Pic-->
															<a href="#" class="symbol symbol-50 symbol-light-success mr-3">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<!--end::Pic-->
															<!--begin::Pic-->
															<a href="#" class="symbol symbol-50 symbol-light-success mr-3">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/028-girl-16.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<!--end::Pic-->
															<!--begin::Pic-->
															<a href="#" class="symbol symbol-50 symbol-light-success mr-3">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/024-boy-9.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<!--end::Pic-->
														</div>
													</div>
													<!--end::Team-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 8-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 9-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Body-->
											<div class="card-body">
												<div class="d-flex flex-wrap align-items-center py-1">
													<!--begin::Pic-->
													<div class="symbol symbol-80 symbol-light-primary mr-5">
														<span class="symbol-label">
															<img src="assets/media/svg/misc/010-vimeo.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
													<!--end::Pic-->
													<!--begin::Title-->
													<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
														<a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-h5">Monthly Subscription
														<br>Based SaaS</a>
														<span class="text-muted font-weight-bold font-size-lg">Due: 27 Apr 2020</span>
													</div>
													<!--end::Title-->
													<!--begin::Stats-->
													<div class="d-flex flex-column w-100 mt-12">
														<span class="text-dark mr-2 font-size-lg font-weight-bolder pb-3">Progress</span>
														<div class="progress progress-xs w-100">
															<div class="progress-bar bg-primary" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
													<!--end::Stats-->
													<!--begin::Team-->
													<div class="d-flex flex-column mt-10">
														<span class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">Team</span>
														<div class="d-flex">
															<!--begin::Pic-->
															<a href="#" class="symbol symbol-50 symbol-light-primary mr-3">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<!--end::Pic-->
															<!--begin::Pic-->
															<a href="#" class="symbol symbol-50 symbol-light-primary mr-3">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/028-girl-16.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<!--end::Pic-->
															<!--begin::Pic-->
															<a href="#" class="symbol symbol-50 symbol-light-primary mr-3">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/024-boy-9.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<!--end::Pic-->
															<!--begin::Pic-->
															<a href="#" class="symbol symbol-50 symbol-light-primary">
																<div class="symbol-label">
																	<img src="assets/media/svg/avatars/005-girl-2.svg" class="h-75 align-self-end" alt="">
																</div>
															</a>
															<!--end::Pic-->
														</div>
													</div>
													<!--end::Team-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 9-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-xl-4">
										<!--begin::Mixed Widget 10-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Info-->
												<div class="d-flex align-items-center pr-2 mb-6">
													<span class="text-muted font-weight-bold font-size-lg flex-grow-1">7 Hours Ago</span>
													<div class="symbol symbol-50">
														<span class="symbol-label bg-light-light">
															<img src="assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
												</div>
												<!--end::Info-->
												<a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-h4">PitStop - Multiple Email
												<br>Generator</a>
												<!--begin::Desc-->
												<p class="text-dark-50 font-weight-normal font-size-lg mt-6">Pitstop creates quick and easy email campaigns.
												<br>We help to leverage and strengthen your brand
												<br>for your every purpose.</p>
												<!--end::Desc-->
												<!--begin::Team-->
												<div class="d-flex align-items-center mt-25">
													<!--begin::Pic-->
													<a href="#" class="symbol symbol-45 symbol-light mr-3">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
													<!--begin::Pic-->
													<a href="#" class="symbol symbol-45 symbol-light mr-3">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/028-girl-16.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
													<!--begin::Pic-->
													<a href="#" class="symbol symbol-45 symbol-light">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/024-boy-9.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
												</div>
												<!--end::Team-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 10-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 11-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Info-->
												<div class="d-flex align-items-center pr-2 mb-6">
													<span class="text-muted font-weight-bold font-size-lg flex-grow-1">2 Days Ago</span>
													<div class="symbol symbol-50">
														<span class="symbol-label bg-light-light">
															<img src="assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
												</div>
												<!--end::Info-->
												<a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-h4">Craft - ReactJS Admin
												<br>Theme</a>
												<!--begin::Desc-->
												<p class="text-dark-50 font-weight-normal font-size-lg mt-6">Craft uses the latest and greatest frameworks
												<br>with ReactJS for complete modernization and
												<br>future proofing your business operations
												<br>and sales opportunities</p>
												<!--end::Desc-->
												<!--begin::Team-->
												<div class="d-flex align-items-center mt-18">
													<!--begin::Pic-->
													<a href="#" class="symbol symbol-45 symbol-light mr-3">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
													<!--begin::Pic-->
													<a href="#" class="symbol symbol-45 symbol-light mr-3">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/028-girl-16.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
													<!--begin: Pic-->
													<a href="#" class="symbol symbol-45 symbol-light mr-3">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/024-boy-9.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
													<!--begin::Pic-->
													<a href="#" class="symbol symbol-45 symbol-light">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/005-girl-2.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
												</div>
												<!--end::Team-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 11-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 12-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Info-->
												<div class="d-flex align-items-center pr-2 mb-6">
													<span class="text-muted font-weight-bold font-size-lg flex-grow-1">5 Weeks Ago</span>
													<div class="symbol symbol-50">
														<span class="symbol-label bg-light-light">
															<img src="assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
												</div>
												<!--end::Info-->
												<a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-h4">KT.com - High Quality
												<br>Templates</a>
												<!--begin::Desc-->
												<p class="text-dark-50 font-weight-normal font-size-lg mt-6">Easy to use, incredibly flexible and secure
												<br>with in-depth documentation that outlines
												<br>everything for you</p>
												<!--end::Desc-->
												<!--begin::Team-->
												<div class="d-flex align-items-center mt-25">
													<!--begin::Pic-->
													<a href="#" class="symbol symbol-45 symbol-light mr-3">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
													<!--begin::Pic-->
													<a href="#" class="symbol symbol-45 symbol-light mr-3">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/028-girl-16.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
													<!--begin::Pic-->
													<a href="#" class="symbol symbol-45 symbol-light">
														<div class="symbol-label">
															<img src="assets/media/svg/avatars/024-boy-9.svg" class="h-75 align-self-end" alt="">
														</div>
													</a>
													<!--end::Pic-->
												</div>
												<!--end::Team-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 12-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-xl-4">
										<!--begin::Mixed Widget 13-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Beader-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title font-weight-bolder">Sales Progress</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover py-5">
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
																		<span class="navi-text">New Group</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-list-3"></i>
																		</span>
																		<span class="navi-text">Contacts</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Groups</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-primary label-inline font-weight-bold">new</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Calls</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-gear"></i>
																		</span>
																		<span class="navi-text">Settings</span>
																	</a>
																</li>
																<li class="navi-separator my-3"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-magnifier-tool"></i>
																		</span>
																		<span class="navi-text">Help</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Privacy</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																		</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 d-flex flex-column" style="position: relative;">
												<!--begin::Stats-->
												<div class="card-spacer pt-5 bg-white flex-grow-1">
													<!--begin::Row-->
													<div class="row row-paddingless">
														<div class="col mr-8">
															<div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
															<div class="font-size-h4 font-weight-bolder">$650</div>
														</div>
														<div class="col">
															<div class="font-size-sm text-muted font-weight-bold">Commission</div>
															<div class="font-size-h4 font-weight-bolder">$233,600</div>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row row-paddingless mt-8">
														<div class="col mr-8">
															<div class="font-size-sm text-muted font-weight-bold">Annual Taxes 2019</div>
															<div class="font-size-h4 font-weight-bolder">$29,004</div>
														</div>
														<div class="col">
															<div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
															<div class="font-size-h4 font-weight-bolder">$1,480,00</div>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
												<!--begin::Chart-->
												<div id="kt_mixed_widget_13_chart" class="card-rounded-bottom" style="height: 200px; min-height: 200px;"><div id="apexchartsrwlgrdib" class="apexcharts-canvas apexchartsrwlgrdib apexcharts-theme-light" style="width: 329px; height: 200px;"><svg id="SvgjsSvg5386" width="329" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5388" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs5387"><clipPath id="gridRectMaskrwlgrdib"><rect id="SvgjsRect5391" width="336" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskrwlgrdib"><rect id="SvgjsRect5392" width="333" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG5400" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG5401" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG5403" class="apexcharts-grid"><g id="SvgjsG5404" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine5406" x1="0" y1="0" x2="329" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5407" x1="0" y1="20" x2="329" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5408" x1="0" y1="40" x2="329" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5409" x1="0" y1="60" x2="329" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5410" x1="0" y1="80" x2="329" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5411" x1="0" y1="100" x2="329" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5412" x1="0" y1="120" x2="329" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5413" x1="0" y1="140" x2="329" y2="140" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5414" x1="0" y1="160" x2="329" y2="160" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5415" x1="0" y1="180" x2="329" y2="180" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5416" x1="0" y1="200" x2="329" y2="200" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG5405" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine5418" x1="0" y1="200" x2="329" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine5417" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG5394" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG5395" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath5398" d="M 0 200L 0 100C 23.029999999999998 100 42.769999999999996 116.66666666666666 65.8 116.66666666666666C 88.83 116.66666666666666 108.57 50 131.6 50C 154.63 50 174.37 100 197.4 100C 220.43 100 240.17 16.666666666666657 263.2 16.666666666666657C 286.23 16.666666666666657 305.97 16.666666666666657 329 16.666666666666657C 329 16.666666666666657 329 16.666666666666657 329 200M 329 16.666666666666657z" fill="rgba(238,229,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskrwlgrdib)" pathTo="M 0 200L 0 100C 23.029999999999998 100 42.769999999999996 116.66666666666666 65.8 116.66666666666666C 88.83 116.66666666666666 108.57 50 131.6 50C 154.63 50 174.37 100 197.4 100C 220.43 100 240.17 16.666666666666657 263.2 16.666666666666657C 286.23 16.666666666666657 305.97 16.666666666666657 329 16.666666666666657C 329 16.666666666666657 329 16.666666666666657 329 200M 329 16.666666666666657z" pathFrom="M -1 200L -1 200L 65.8 200L 131.6 200L 197.4 200L 263.2 200L 329 200"></path><path id="SvgjsPath5399" d="M 0 100C 23.029999999999998 100 42.769999999999996 116.66666666666666 65.8 116.66666666666666C 88.83 116.66666666666666 108.57 50 131.6 50C 154.63 50 174.37 100 197.4 100C 220.43 100 240.17 16.666666666666657 263.2 16.666666666666657C 286.23 16.666666666666657 305.97 16.666666666666657 329 16.666666666666657" fill="none" fill-opacity="1" stroke="#8950fc" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskrwlgrdib)" pathTo="M 0 100C 23.029999999999998 100 42.769999999999996 116.66666666666666 65.8 116.66666666666666C 88.83 116.66666666666666 108.57 50 131.6 50C 154.63 50 174.37 100 197.4 100C 220.43 100 240.17 16.666666666666657 263.2 16.666666666666657C 286.23 16.666666666666657 305.97 16.666666666666657 329 16.666666666666657" pathFrom="M -1 200L -1 200L 65.8 200L 131.6 200L 197.4 200L 263.2 200L 329 200"></path><g id="SvgjsG5396" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle5424" r="0" cx="0" cy="0" class="apexcharts-marker w43qjqmhj no-pointer-events" stroke="#8950fc" fill="#eee5ff" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG5397" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine5419" x1="0" y1="0" x2="329" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5420" x1="0" y1="0" x2="329" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG5421" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG5422" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG5423" class="apexcharts-point-annotations"></g></g><g id="SvgjsG5402" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG5389" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(238, 229, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 394px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 13-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 14-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title font-weight-bolder">Action Needed</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover py-5">
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
																		<span class="navi-text">New Group</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-list-3"></i>
																		</span>
																		<span class="navi-text">Contacts</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Groups</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-primary label-inline font-weight-bold">new</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Calls</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-gear"></i>
																		</span>
																		<span class="navi-text">Settings</span>
																	</a>
																</li>
																<li class="navi-separator my-3"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-magnifier-tool"></i>
																		</span>
																		<span class="navi-text">Help</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Privacy</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																		</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
												<div class="flex-grow-1" style="position: relative;">
													<div id="kt_mixed_widget_14_chart" style="height: 200px; min-height: 200.7px;"><div id="apexchartslvbjbutm" class="apexcharts-canvas apexchartslvbjbutm apexcharts-theme-light" style="width: 270px; height: 200.7px;"><svg id="SvgjsSvg5425" width="270" height="200.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5427" class="apexcharts-inner apexcharts-graphical" transform="translate(48, 0)"><defs id="SvgjsDefs5426"><clipPath id="gridRectMasklvbjbutm"><rect id="SvgjsRect5429" width="182" height="200" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMasklvbjbutm"><rect id="SvgjsRect5430" width="180" height="202" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG5432" class="apexcharts-radialbar"><g id="SvgjsG5433"><g id="SvgjsG5434" class="apexcharts-tracks"><g id="SvgjsG5435" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 88 29.693292682926824 A 69.30670731707318 69.30670731707318 0 1 1 87.9879036976974 29.69329373852834" fill="none" fill-opacity="1" stroke="rgba(201,247,245,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="10.852439024390247" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 29.693292682926824 A 69.30670731707318 69.30670731707318 0 1 1 87.9879036976974 29.69329373852834"></path></g></g><g id="SvgjsG5437"><g id="SvgjsG5441" class="apexcharts-series apexcharts-radial-series" seriesName="Progress" rel="1" data:realIndex="0"><path id="SvgjsPath5442" d="M 88 29.693292682926824 A 69.30670731707318 69.30670731707318 0 1 1 18.862120338608293 103.8345915092552" fill="none" fill-opacity="0.85" stroke="rgba(27,197,189,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="10.852439024390247" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="266" data:value="74" index="0" j="0" data:pathOrig="M 88 29.693292682926824 A 69.30670731707318 69.30670731707318 0 1 1 18.862120338608293 103.8345915092552"></path></g><circle id="SvgjsCircle5438" r="63.88048780487805" cx="88" cy="99" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG5439" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText5440" font-family="Helvetica, Arial, sans-serif" x="88" y="111" text-anchor="middle" dominant-baseline="auto" font-size="30px" font-weight="700" fill="#464e5f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">74%</text></g></g></g></g><line id="SvgjsLine5443" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5444" x1="0" y1="0" x2="176" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG5428" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
												<div class="resize-triggers"><div class="expand-trigger"><div style="width: 271px; height: 215px;"></div></div><div class="contract-trigger"></div></div></div>
												<div class="pt-5">
													<p class="text-center font-weight-normal font-size-lg pb-7">Notes: Current sprint requires stakeholders
													<br>to approve newly amended policies</p>
													<a href="#" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">Generate Report</a>
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 14-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 15-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title font-weight-bolder">Trends</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Naviigation-->
															<ul class="navi">
																<li class="navi-header font-weight-bold py-5">
																	<span class="font-size-lg">Add New:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Members</span>
																		<span class="navi-label">
																			<span class="label label-light-danger label-rounded font-weight-bold">3</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-telegram-logo"></i>
																		</span>
																		<span class="navi-text">Project</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-new-email"></i>
																		</span>
																		<span class="navi-text">Record</span>
																		<span class="navi-label">
																			<span class="label label-light-success label-rounded font-weight-bold">5</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer pt-5 pb-4">
																	<a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
																	<a class="btn btn-clean font-weight-bold btn-sm d-none" href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more...">Learn more</a>
																</li>
															</ul>
															<!--end::Naviigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column" style="position: relative;">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_15_chart" style="height: 150px; min-height: 150px;"><div id="apexchartsoeox9xd4" class="apexcharts-canvas apexchartsoeox9xd4 apexcharts-theme-light" style="width: 270px; height: 150px;"><svg id="SvgjsSvg5446" width="270" height="150" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5448" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs5447"><clipPath id="gridRectMaskoeox9xd4"><rect id="SvgjsRect5451" width="277" height="153" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskoeox9xd4"><rect id="SvgjsRect5452" width="274" height="154" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient5458" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop5459" stop-opacity="1" stop-color="rgba(255,241,242,1)" offset="0.25"></stop><stop id="SvgjsStop5460" stop-opacity="0.375" stop-color="rgba(255,226,229,0.375)" offset="0.5"></stop><stop id="SvgjsStop5461" stop-opacity="0.375" stop-color="rgba(255,226,229,0.375)" offset="1"></stop></linearGradient></defs><g id="SvgjsG5464" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG5465" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG5467" class="apexcharts-grid"><g id="SvgjsG5468" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine5470" x1="0" y1="0" x2="270" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5471" x1="0" y1="15" x2="270" y2="15" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5472" x1="0" y1="30" x2="270" y2="30" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5473" x1="0" y1="45" x2="270" y2="45" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5474" x1="0" y1="60" x2="270" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5475" x1="0" y1="75" x2="270" y2="75" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5476" x1="0" y1="90" x2="270" y2="90" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5477" x1="0" y1="105" x2="270" y2="105" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5478" x1="0" y1="120" x2="270" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5479" x1="0" y1="135" x2="270" y2="135" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5480" x1="0" y1="150" x2="270" y2="150" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG5469" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine5482" x1="0" y1="150" x2="270" y2="150" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine5481" x1="0" y1="1" x2="0" y2="150" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG5454" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG5455" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath5462" d="M 0 150L 0 80.76923076923077C 18.9 80.76923076923077 35.1 80.76923076923077 54 80.76923076923077C 72.9 80.76923076923077 89.1 11.538461538461547 108 11.538461538461547C 126.9 11.538461538461547 143.1 92.3076923076923 162 92.3076923076923C 180.9 92.3076923076923 197.1 92.3076923076923 216 92.3076923076923C 234.9 92.3076923076923 251.1 57.69230769230769 270 57.69230769230769C 270 57.69230769230769 270 57.69230769230769 270 150M 270 57.69230769230769z" fill="url(#SvgjsLinearGradient5458)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskoeox9xd4)" pathTo="M 0 150L 0 80.76923076923077C 18.9 80.76923076923077 35.1 80.76923076923077 54 80.76923076923077C 72.9 80.76923076923077 89.1 11.538461538461547 108 11.538461538461547C 126.9 11.538461538461547 143.1 92.3076923076923 162 92.3076923076923C 180.9 92.3076923076923 197.1 92.3076923076923 216 92.3076923076923C 234.9 92.3076923076923 251.1 57.69230769230769 270 57.69230769230769C 270 57.69230769230769 270 57.69230769230769 270 150M 270 57.69230769230769z" pathFrom="M -1 150L -1 150L 54 150L 108 150L 162 150L 216 150L 270 150"></path><path id="SvgjsPath5463" d="M 0 80.76923076923077C 18.9 80.76923076923077 35.1 80.76923076923077 54 80.76923076923077C 72.9 80.76923076923077 89.1 11.538461538461547 108 11.538461538461547C 126.9 11.538461538461547 143.1 92.3076923076923 162 92.3076923076923C 180.9 92.3076923076923 197.1 92.3076923076923 216 92.3076923076923C 234.9 92.3076923076923 251.1 57.69230769230769 270 57.69230769230769" fill="none" fill-opacity="1" stroke="#f64e60" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskoeox9xd4)" pathTo="M 0 80.76923076923077C 18.9 80.76923076923077 35.1 80.76923076923077 54 80.76923076923077C 72.9 80.76923076923077 89.1 11.538461538461547 108 11.538461538461547C 126.9 11.538461538461547 143.1 92.3076923076923 162 92.3076923076923C 180.9 92.3076923076923 197.1 92.3076923076923 216 92.3076923076923C 234.9 92.3076923076923 251.1 57.69230769230769 270 57.69230769230769" pathFrom="M -1 150L -1 150L 54 150L 108 150L 162 150L 216 150L 270 150"></path><g id="SvgjsG5456" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle5488" r="0" cx="0" cy="0" class="apexcharts-marker wg0jigg44h no-pointer-events" stroke="#f64e60" fill="#ffe2e5" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG5457" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine5483" x1="0" y1="0" x2="270" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5484" x1="0" y1="0" x2="270" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG5485" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG5486" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG5487" class="apexcharts-point-annotations"></g></g><g id="SvgjsG5466" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG5449" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 226, 229);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
												<!--begin::Items-->
												<div class="mt-5 flex-grow-1">
													<!--begin::Item-->
													<div class="d-flex align-items-center justify-content-between mb-5">
														<!--begin::Section-->
														<div class="d-flex align-items-center mr-2">
															<!--begin::Symbol-->
															<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
																<div class="symbol-label">
																	<img src="assets/media/svg/misc/006-plurk.svg" class="h-50" alt="">
																</div>
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div>
																<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Authors</a>
																<div class="font-size-sm text-muted font-weight-bold mt-1">Ricky Hunt, Sandra Trepp</div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
														<!--begin::Label-->
														<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+82$</div>
														<!--end::Label-->
													</div>
													<!--end::Item-->
													<!--begin::Widget Item-->
													<div class="d-flex align-items-center justify-content-between mb-5">
														<!--begin::Section-->
														<div class="d-flex align-items-center mr-2">
															<!--begin::Symbol-->
															<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
																<div class="symbol-label">
																	<img src="assets/media/svg/misc/015-telegram.svg" class="h-50" alt="">
																</div>
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div>
																<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Sales</a>
																<div class="font-size-sm text-muted font-weight-bold mt-1">PitStop Emails</div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
														<!--begin::Label-->
														<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+82$</div>
														<!--end::Label-->
													</div>
													<!--end::Widget Item-->
													<!--begin::Widget Item-->
													<div class="d-flex align-items-center justify-content-between">
														<!--begin::Section-->
														<div class="d-flex align-items-center mr-2">
															<!--begin::Symbol-->
															<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
																<div class="symbol-label">
																	<img src="assets/media/svg/misc/003-puzzle.svg" class="h-50" alt="">
																</div>
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div>
																<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Engagement</a>
																<div class="font-size-sm text-muted font-weight-bold mt-1">KT.com</div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
														<!--begin::Label-->
														<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+82$</div>
														<!--end::Label-->
													</div>
													<!--end::Widget Item-->
												</div>
												<!--end::Widget Items-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 402px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 15-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-xl-4">
										<!--begin::Mixed Widget 16-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title font-weight-bolder">
													<div class="card-label">Weekly Sales Stats
													<div class="font-size-sm text-muted mt-2">890,344 Sales</div></div>
												</div>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column" style="position: relative;">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_16_chart" style="height: 200px; min-height: 200.7px;"><div id="apexcharts9wl36eb" class="apexcharts-canvas apexcharts9wl36eb apexcharts-theme-light" style="width: 270px; height: 200.7px;"><svg id="SvgjsSvg5489" width="270" height="200.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5491" class="apexcharts-inner apexcharts-graphical" transform="translate(48, 0)"><defs id="SvgjsDefs5490"><clipPath id="gridRectMask9wl36eb"><rect id="SvgjsRect5493" width="182" height="200" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMask9wl36eb"><rect id="SvgjsRect5494" width="180" height="202" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG5496" class="apexcharts-radialbar"><g id="SvgjsG5497"><g id="SvgjsG5498" class="apexcharts-tracks"><g id="SvgjsG5499" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 88 24.937560975609756 A 74.06243902439024 74.06243902439024 0 1 1 87.98707366593528 24.937562103645206" fill="none" fill-opacity="1" stroke="rgba(243,246,249,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 24.937560975609756 A 74.06243902439024 74.06243902439024 0 1 1 87.98707366593528 24.937562103645206"></path></g><g id="SvgjsG5501" class="apexcharts-radialbar-track apexcharts-track" rel="2"><path id="apexcharts-radialbarTrack-1" d="M 88 37.619512195121956 A 61.380487804878044 61.380487804878044 0 1 1 87.98928708396762 37.61951313000024" fill="none" fill-opacity="1" stroke="rgba(243,246,249,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 37.619512195121956 A 61.380487804878044 61.380487804878044 0 1 1 87.98928708396762 37.61951313000024"></path></g><g id="SvgjsG5503" class="apexcharts-radialbar-track apexcharts-track" rel="3"><path id="apexcharts-radialbarTrack-2" d="M 88 50.301463414634156 A 48.698536585365844 48.698536585365844 0 1 1 87.99150050199997 50.30146415635528" fill="none" fill-opacity="1" stroke="rgba(243,246,249,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 50.301463414634156 A 48.698536585365844 48.698536585365844 0 1 1 87.99150050199997 50.30146415635528"></path></g><g id="SvgjsG5505" class="apexcharts-radialbar-track apexcharts-track" rel="4"><path id="apexcharts-radialbarTrack-3" d="M 88 62.98341463414636 A 36.01658536585364 36.01658536585364 0 1 1 87.9937139200323 62.98341518271032" fill="none" fill-opacity="1" stroke="rgba(243,246,249,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 62.98341463414636 A 36.01658536585364 36.01658536585364 0 1 1 87.9937139200323 62.98341518271032"></path></g></g><g id="SvgjsG5507"><g id="SvgjsG5511" class="apexcharts-series apexcharts-radial-series" seriesName="Progress" rel="1" data:realIndex="0"><path id="SvgjsPath5512" d="M 88 24.937560975609756 A 74.06243902439024 74.06243902439024 0 1 1 44.467190592652884 158.91777181559002" fill="none" fill-opacity="0.85" stroke="rgba(137,80,252,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="216" data:value="60" index="0" j="0" data:pathOrig="M 88 24.937560975609756 A 74.06243902439024 74.06243902439024 0 1 1 44.467190592652884 158.91777181559002"></path></g><g id="SvgjsG5513" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx2" rel="2" data:realIndex="1"><path id="SvgjsPath5514" d="M 88 37.619512195121956 A 61.380487804878044 61.380487804878044 0 0 1 88 160.38048780487804" fill="none" fill-opacity="0.85" stroke="rgba(246,78,96,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-1" data:angle="180" data:value="50" index="0" j="1" data:pathOrig="M 88 37.619512195121956 A 61.380487804878044 61.380487804878044 0 0 1 88 160.38048780487804"></path></g><g id="SvgjsG5515" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx3" rel="3" data:realIndex="2"><path id="SvgjsPath5516" d="M 88 50.301463414634156 A 48.698536585365844 48.698536585365844 0 1 1 39.301463414634156 99" fill="none" fill-opacity="0.85" stroke="rgba(27,197,189,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-2" data:angle="270" data:value="75" index="0" j="2" data:pathOrig="M 88 50.301463414634156 A 48.698536585365844 48.698536585365844 0 1 1 39.301463414634156 99"></path></g><g id="SvgjsG5517" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx4" rel="4" data:realIndex="3"><path id="SvgjsPath5518" d="M 88 62.98341463414636 A 36.01658536585364 36.01658536585364 0 1 1 53.746191793104224 87.87026304259518" fill="none" fill-opacity="0.85" stroke="rgba(54,153,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.681951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-3" data:angle="288" data:value="80" index="0" j="3" data:pathOrig="M 88 62.98341463414636 A 36.01658536585364 36.01658536585364 0 1 1 53.746191793104224 87.87026304259518"></path></g><circle id="SvgjsCircle5508" r="32.17560975609756" cx="88" cy="99" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG5509" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText5510" font-family="Helvetica, Arial, sans-serif" x="88" y="109" text-anchor="middle" dominant-baseline="auto" font-size="18px" font-weight="700" fill="#464e5f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">60%</text></g></g></g></g><line id="SvgjsLine5519" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5520" x1="0" y1="0" x2="176" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG5492" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
												<!--end::Chart-->
												<!--begin::Items-->
												<div class="mt-10 mb-5">
													<div class="row row-paddingless mb-10">
														<!--begin::Item-->
														<div class="col">
															<div class="d-flex align-items-center mr-2">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
																	<div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-info">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																					<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</div>
																</div>
																<!--end::Symbol-->
																<!--begin::Title-->
																<div>
																	<div class="font-size-h4 text-dark-75 font-weight-bolder">$2,034</div>
																	<div class="font-size-sm text-muted font-weight-bold mt-1">Author Sales</div>
																</div>
																<!--end::Title-->
															</div>
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="col">
															<div class="d-flex align-items-center mr-2">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
																	<div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-danger">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
																					<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</div>
																</div>
																<!--end::Symbol-->
																<!--begin::Title-->
																<div>
																	<div class="font-size-h4 text-dark-75 font-weight-bolder">$706</div>
																	<div class="font-size-sm text-muted font-weight-bold mt-1">Commission</div>
																</div>
																<!--end::Title-->
															</div>
														</div>
														<!--end::Item-->
													</div>
													<div class="row row-paddingless">
														<!--begin::Item-->
														<div class="col">
															<div class="d-flex align-items-center mr-2">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
																	<div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-success">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																					<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</div>
																</div>
																<!--end::Symbol-->
																<!--begin::Title-->
																<div>
																	<div class="font-size-h4 text-dark-75 font-weight-bolder">$49</div>
																	<div class="font-size-sm text-muted font-weight-bold mt-1">Average Bid</div>
																</div>
																<!--end::Title-->
															</div>
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="col">
															<div class="d-flex align-items-center mr-2">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
																	<div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<rect fill="#000000" opacity="0.3" x="5" y="8" width="8" height="16"></rect>
																					<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</div>
																</div>
																<!--end::Symbol-->
																<!--begin::Title-->
																<div>
																	<div class="font-size-h4 text-dark-75 font-weight-bolder">$5.8M</div>
																	<div class="font-size-sm text-muted font-weight-bold mt-1">All Time Sales</div>
																</div>
																<!--end::Title-->
															</div>
														</div>
														<!--end::Item-->
													</div>
												</div>
												<!--end::Items-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 449px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 16-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 17-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title font-weight-bolder">
													<div class="card-label">Weekly Sales Stats
													<div class="font-size-sm text-muted mt-2">890,344 Sales</div></div>
												</div>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Naviigation-->
															<ul class="navi">
																<li class="navi-header font-weight-bold py-5">
																	<span class="font-size-lg">Add New:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Members</span>
																		<span class="navi-label">
																			<span class="label label-light-danger label-rounded font-weight-bold">3</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-telegram-logo"></i>
																		</span>
																		<span class="navi-text">Project</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-new-email"></i>
																		</span>
																		<span class="navi-text">Record</span>
																		<span class="navi-label">
																			<span class="label label-light-success label-rounded font-weight-bold">5</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer pt-5 pb-4">
																	<a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
																	<a class="btn btn-clean font-weight-bold btn-sm d-none" href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more...">Learn more</a>
																</li>
															</ul>
															<!--end::Naviigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 d-flex flex-column" style="position: relative;">
												<!--begin::Items-->
												<div class="flex-grow-1 card-spacer">
													<div class="row row-paddingless mt-5 mb-10">
														<!--begin::Item-->
														<div class="col">
															<div class="d-flex align-items-center mr-2">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
																	<div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-info">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																					<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</div>
																</div>
																<!--end::Symbol-->
																<!--begin::Title-->
																<div>
																	<div class="font-size-h4 text-dark-75 font-weight-bolder">$2,034</div>
																	<div class="font-size-sm text-muted font-weight-bold mt-1">Author Sales</div>
																</div>
																<!--end::Title-->
															</div>
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="col">
															<div class="d-flex align-items-center mr-2">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
																	<div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-danger">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
																					<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</div>
																</div>
																<!--end::Symbol-->
																<!--begin::Title-->
																<div>
																	<div class="font-size-h4 text-dark-75 font-weight-bolder">$706</div>
																	<div class="font-size-sm text-muted font-weight-bold mt-1">Commision</div>
																</div>
																<!--end::Title-->
															</div>
														</div>
														<!--end::Widget Item-->
													</div>
													<div class="row row-paddingless">
														<!--begin::Item-->
														<div class="col">
															<div class="d-flex align-items-center mr-2">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
																	<div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-success">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																					<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</div>
																</div>
																<!--end::Symbol-->
																<!--begin::Title-->
																<div>
																	<div class="font-size-h4 text-dark-75 font-weight-bolder">$49</div>
																	<div class="font-size-sm text-muted font-weight-bold mt-1">Average Bid</div>
																</div>
																<!--end::Title-->
															</div>
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="col">
															<div class="d-flex align-items-center mr-2">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
																	<div class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"></rect>
																					<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</div>
																</div>
																<!--end::Symbol-->
																<!--begin::Title-->
																<div>
																	<div class="font-size-h4 text-dark-75 font-weight-bolder">$5.8M</div>
																	<div class="font-size-sm text-muted font-weight-bold mt-1">All Time Sales</div>
																</div>
																<!--end::Title-->
															</div>
														</div>
														<!--end::Item-->
													</div>
												</div>
												<!--end::Items-->
												<!--begin::Chart-->
												<div id="kt_mixed_widget_17_chart" class="card-rounded-bottom" data-color="warning" style="height: 200px; min-height: 200px;"><div id="apexcharts67grridqi" class="apexcharts-canvas apexcharts67grridqi apexcharts-theme-light" style="width: 329px; height: 200px;"><svg id="SvgjsSvg5522" width="329" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5524" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs5523"><clipPath id="gridRectMask67grridqi"><rect id="SvgjsRect5527" width="336" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMask67grridqi"><rect id="SvgjsRect5528" width="333" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG5536" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG5537" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG5539" class="apexcharts-grid"><g id="SvgjsG5540" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine5542" x1="0" y1="0" x2="329" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5543" x1="0" y1="20" x2="329" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5544" x1="0" y1="40" x2="329" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5545" x1="0" y1="60" x2="329" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5546" x1="0" y1="80" x2="329" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5547" x1="0" y1="100" x2="329" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5548" x1="0" y1="120" x2="329" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5549" x1="0" y1="140" x2="329" y2="140" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5550" x1="0" y1="160" x2="329" y2="160" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5551" x1="0" y1="180" x2="329" y2="180" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine5552" x1="0" y1="200" x2="329" y2="200" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG5541" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine5554" x1="0" y1="200" x2="329" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine5553" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG5530" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG5531" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath5534" d="M 0 200L 0 100C 23.029999999999998 100 42.769999999999996 116.66666666666666 65.8 116.66666666666666C 88.83 116.66666666666666 108.57 50 131.6 50C 154.63 50 174.37 100 197.4 100C 220.43 100 240.17 16.666666666666657 263.2 16.666666666666657C 286.23 16.666666666666657 305.97 16.666666666666657 329 16.666666666666657C 329 16.666666666666657 329 16.666666666666657 329 200M 329 16.666666666666657z" fill="rgba(255,244,222,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask67grridqi)" pathTo="M 0 200L 0 100C 23.029999999999998 100 42.769999999999996 116.66666666666666 65.8 116.66666666666666C 88.83 116.66666666666666 108.57 50 131.6 50C 154.63 50 174.37 100 197.4 100C 220.43 100 240.17 16.666666666666657 263.2 16.666666666666657C 286.23 16.666666666666657 305.97 16.666666666666657 329 16.666666666666657C 329 16.666666666666657 329 16.666666666666657 329 200M 329 16.666666666666657z" pathFrom="M -1 200L -1 200L 65.8 200L 131.6 200L 197.4 200L 263.2 200L 329 200"></path><path id="SvgjsPath5535" d="M 0 100C 23.029999999999998 100 42.769999999999996 116.66666666666666 65.8 116.66666666666666C 88.83 116.66666666666666 108.57 50 131.6 50C 154.63 50 174.37 100 197.4 100C 220.43 100 240.17 16.666666666666657 263.2 16.666666666666657C 286.23 16.666666666666657 305.97 16.666666666666657 329 16.666666666666657" fill="none" fill-opacity="1" stroke="#ffa800" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask67grridqi)" pathTo="M 0 100C 23.029999999999998 100 42.769999999999996 116.66666666666666 65.8 116.66666666666666C 88.83 116.66666666666666 108.57 50 131.6 50C 154.63 50 174.37 100 197.4 100C 220.43 100 240.17 16.666666666666657 263.2 16.666666666666657C 286.23 16.666666666666657 305.97 16.666666666666657 329 16.666666666666657" pathFrom="M -1 200L -1 200L 65.8 200L 131.6 200L 197.4 200L 263.2 200L 329 200"></path><g id="SvgjsG5532" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle5560" r="0" cx="0" cy="0" class="apexcharts-marker wt9jptl7c no-pointer-events" stroke="#ffa800" fill="#fff4de" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG5533" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine5555" x1="0" y1="0" x2="329" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5556" x1="0" y1="0" x2="329" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG5557" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG5558" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG5559" class="apexcharts-point-annotations"></g></g><g id="SvgjsG5538" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG5525" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 244, 222);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 449px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 17-->
									</div>
									<div class="col-xl-4">
										<!--begin::Mixed Widget 18-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<div class="card-title font-weight-bolder">
													<div class="card-label">Weekly Sales Stats
													<div class="font-size-sm text-muted mt-2">890,344 Sales</div></div>
												</div>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body" style="position: relative;">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_18_chart" style="height: 250px; min-height: 192.089px;"><div id="apexchartskgxd67ab" class="apexcharts-canvas apexchartskgxd67ab apexcharts-theme-light" style="width: 270px; height: 192.089px;"><svg id="SvgjsSvg5561" width="270" height="192.089111328125" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG5563" class="apexcharts-inner apexcharts-graphical" transform="translate(23, 0)"><defs id="SvgjsDefs5562"><clipPath id="gridRectMaskkgxd67ab"><rect id="SvgjsRect5565" width="232" height="250" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskkgxd67ab"><rect id="SvgjsRect5566" width="230" height="252" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG5568" class="apexcharts-radialbar"><g id="SvgjsG5569"><g id="SvgjsG5570" class="apexcharts-tracks"><g id="SvgjsG5571" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 21.393902439024387 123.99999999999999 A 91.60609756097561 91.60609756097561 0 0 1 204.60609756097563 124" fill="none" fill-opacity="1" stroke="rgba(225,240,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="12.246341463414632" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 21.393902439024387 123.99999999999999 A 91.60609756097561 91.60609756097561 0 0 1 204.60609756097563 124"></path></g></g><g id="SvgjsG5573"><g id="SvgjsG5578" class="apexcharts-series apexcharts-radial-series" seriesName="Progress" rel="1" data:realIndex="0"><path id="SvgjsPath5579" d="M 21.393902439024387 123.99999999999999 A 91.60609756097561 91.60609756097561 0 0 1 175.4752083083106 57.00354145789362" fill="none" fill-opacity="0.85" stroke="rgba(54,153,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="12.246341463414634" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="133" data:value="74" index="0" j="0" data:pathOrig="M 21.393902439024387 123.99999999999999 A 91.60609756097561 91.60609756097561 0 0 1 175.4752083083106 57.00354145789362"></path></g><circle id="SvgjsCircle5574" r="85.4829268292683" cx="113" cy="124" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG5575" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText5576" font-family="Helvetica, Arial, sans-serif" x="113" y="119" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="700" fill="#b5b5c3" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Progress</text><text id="SvgjsText5577" font-family="Helvetica, Arial, sans-serif" x="113" y="100" text-anchor="middle" dominant-baseline="auto" font-size="30px" font-weight="700" fill="#464e5f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">74%</text></g></g></g></g><line id="SvgjsLine5580" x1="0" y1="0" x2="226" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine5581" x1="0" y1="0" x2="226" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG5564" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
												<!--end::Chart-->
												<!--begin::Items-->
												<div class="mt-n12 position-relative zindex-0">
													<!--begin::Widget Item-->
													<div class="d-flex align-items-center mb-8">
														<!--begin::Symbol-->
														<div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
															<div class="symbol-label">
																<span class="svg-icon svg-icon-lg svg-icon-gray-500">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"></rect>
																			<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
																			<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
																			<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
																			<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Most Sales</a>
															<div class="font-size-sm text-muted font-weight-bold mt-1">Authors with the best sales</div>
														</div>
														<!--end::Title-->
													</div>
													<!--end::Widget Item-->
													<!--begin::Widget Item-->
													<div class="d-flex align-items-center mb-8">
														<!--begin::Symbol-->
														<div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
															<div class="symbol-label">
																<span class="svg-icon svg-icon-lg svg-icon-gray-500">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-pie.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"></rect>
																			<path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"></path>
																			<path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"></path>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Total Sales Lead</a>
															<div class="font-size-sm text-muted font-weight-bold mt-1">40% increased on week-to-week reports</div>
														</div>
														<!--end::Title-->
													</div>
													<!--end::Widget Item-->
													<!--begin::Widget Item-->
													<div class="d-flex align-items-center">
														<!--begin::Symbol-->
														<div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
															<div class="symbol-label">
																<span class="svg-icon svg-icon-lg svg-icon-gray-500">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
																			<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Average Bestseller</a>
															<div class="font-size-sm text-muted font-weight-bold mt-1">Pitstop Email Marketing</div>
														</div>
														<!--end::Title-->
													</div>
													<!--end::Widget Item-->
												</div>
												<!--end::Items-->
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 330px; height: 449px;"></div></div><div class="contract-trigger"></div></div></div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 18-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-xl-4"></div>
									<div class="col-xl-4">
										<div class="row">
											<div class="col-xl-6"></div>
											<div class="col-xl-6"></div>
										</div>
									</div>
									<div class="col-xl-4"></div>
								</div>
								<!--end::Row-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2020©</span>
								<a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
							<div class="nav nav-dark">
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
							</div>
							<!--end::Nav-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
								<li class="menu-section">
									<h4 class="menu-text">Layout</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
													<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Themes</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Themes</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/themes/aside-light.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Light Aside</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/themes/header-dark.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dark Header</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
													<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Subheaders</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Subheaders</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/toolbar.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Toolbar Nav</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/actions.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Actions Buttons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/tabbed.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tabbed Nav</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/classic.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Classic</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/none.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">None</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
													<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">General</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">General</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/fluid-content.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Fluid Content</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/minimized-aside.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Minimized Aside</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/no-aside.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">No Aside</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/empty-page.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Empty Page</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/fixed-footer.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Fixed Footer</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/no-header-menu.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">No Header Menu</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item" aria-haspopup="true">
									<a target="_blank" href="https://keenthemes.com/metronic/preview/demo1/builder.html" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
													<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Builder</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">CRUD</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
													<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Forms</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Forms</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Controls</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/base.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Base Inputs</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/input-group.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Input Groups</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/checkbox.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Checkbox</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/radio.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Radio</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/switch.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Switch</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/option.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Mega Options</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Widgets</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-datepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Datepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-datetimepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Datetimepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-timepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Timepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-daterangepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Daterangepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/tagify.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Tagify</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-touchspin.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Touchspin</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-maxlength.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Maxlength</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-switch.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Switch</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-multipleselectsplitter.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Multiple Select Splitter</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-select.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Bootstrap Select</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/select2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Select2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/typeahead.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Typeahead</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/nouislider.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">noUiSlider</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/form-repeater.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Form Repeater</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/ion-range-slider.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ion Range Slider</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/input-mask.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Input Masks</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/autosize.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Autosize</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/clipboard.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Clipboard</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/recaptcha.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Google reCaptcha</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Text Editors</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/tinymce.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">TinyMCE</span>
															</a>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">CKEditor</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-classic.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Classic</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-inline.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Inline</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-balloon.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Balloon</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-balloon-block.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Balloon Block</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-document.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Document</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/quill.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Quill Text Editor</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/summernote.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Summernote WYSIWYG</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/bootstrap-markdown.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Markdown Editor</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Layouts</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/default-forms.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Default Forms</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/multi-column-forms.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Multi Column Forms</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/action-bars.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Basic Action Bars</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/sticky-action-bar.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Sticky Action Bar</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Validation</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/validation/states.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Validation States</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/validation/form-controls.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Form Controls</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/validation/form-widgets.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Form Widgets</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-left-panel-2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000" />
													<rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">KTDatatable</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">KTDatatable</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Base</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/data-local.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Local Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/data-json.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">JSON Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/data-ajax.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ajax Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/html-table.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">HTML Table</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/local-sort.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Local Sort</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/translation.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Translation</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advanced</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/record-selection.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Record Selection</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/row-details.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Row Details</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/modal.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Modal Examples</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/column-rendering.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Rendering</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/column-width.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Width</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/vertical.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Vertical Scrolling</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Child Datatables</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/child/data-local.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Local Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/child/data-ajax.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Remote Data</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">API</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/api/methods.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">API Methods</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/api/events.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Events</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-horizontal.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="6" rx="1.5" />
													<rect fill="#000000" x="4" y="13" width="16" height="6" rx="1.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Datatables.net</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Datatables.net</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Basic</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/basic.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Basic Tables</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/scrollable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Scrollable Tables</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/headers.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Complex Headers</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/paginations.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pagination Options</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advanced</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/column-rendering.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Rendering</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/multiple-controls.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Multiple Controls</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/column-visibility.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Visibility</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/row-callback.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Row Callback</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/row-grouping.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Row Grouping</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/footer-callback.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Footer Callback</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Data sources</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/html.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">HTML</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/javascript.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Javascript</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/ajax-client-side.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ajax Client-side</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/ajax-server-side.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ajax Server-side</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Search Options</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/search-options/column-search.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Search</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/search-options/advanced-search.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Advanced Search</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Extensions</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/buttons.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Buttons</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/colreorder.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">ColReorder</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/keytable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">KeyTable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/responsive.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Responsive</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/rowgroup.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">RowGroup</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/rowreorder.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">RowReorder</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/scroller.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Scroller</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/select.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Select</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Files/Upload.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1" />
													<path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">File Upload</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="crud/file-upload/image-input.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Image Input</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="crud/file-upload/dropzonejs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">DropzoneJS</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="crud/file-upload/uppy.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Uppy</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Features</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
													<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Bootstrap</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Bootstrap</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/typography.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Typography</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/buttons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Buttons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/button-group.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Button Group</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/dropdown.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dropdown</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/navs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Navs</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/tables.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tables</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/progress.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Progress</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/modal.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Modal</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/alerts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Alerts</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/popover.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Popover</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/tooltip.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tooltip</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Files/Pictures1.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3" />
													<polygon fill="#000000" opacity="0.3" points="4 19 10 11 16 19" />
													<polygon fill="#000000" points="11 19 15 14 19 19" />
													<path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Custom</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Custom</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/utilities.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Utilities</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/label.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Labels</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/pulse.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Pulse</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/line-tabs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Line Tabs</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/advance-navs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advance Navs</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/timeline.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Timeline</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/pagination.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Pagination</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/symbol.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Symbol</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/overlay.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Overlay</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/spinners.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Spinners</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/iconbox.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Iconbox</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/callout.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Callout</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/ribbons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Ribbons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/accordions.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Accordions</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-arrange.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000" />
													<path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Cards</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Cards</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/general.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">General Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/stacked.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Stacked Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/tabbed.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tabbed Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/draggable.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Draggable Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/tools.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Cards Tools</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/sticky.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Sticky Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/stretched.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Stretched Cards</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Diagnostics.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="18" rx="2" />
													<path d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z" fill="#000000" fill-rule="nonzero" />
													<circle fill="#000000" opacity="0.3" cx="19" cy="6" r="1" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Widgets</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Widgets</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/lists.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Lists</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/stats.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Stats</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/charts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Charts</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/mixed.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Mixed</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/tiles.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tiles</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/engage.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Engage</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/base-tables.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Base Tables</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/advance-tables.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advance Tables</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/forms.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Forms</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)" />
													<path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)" />
													<path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)" />
													<path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Icons</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/svg.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">SVG Icons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/custom-icons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Custom Icons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/flaticon.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Flaticon</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/fontawesome5.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Fontawesome 5</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/lineawesome.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Lineawesome</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/socicons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Socicons</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Select.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z" fill="#000000" opacity="0.3" />
													<path d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Calendar</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Calendar</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/basic.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Basic Calendar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/list-view.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">List Views</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/google.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Google Calendar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/external-events.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">External Events</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/background-events.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Background Events</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
													<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
													<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
													<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Charts</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Charts</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/charts/apexcharts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Apexcharts</span>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">amCharts</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="features/charts/amcharts/charts.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">amCharts Charts</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="features/charts/amcharts/stock-charts.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">amCharts Stock Charts</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="features/charts/amcharts/maps.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">amCharts Maps</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/charts/flotcharts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Flot Charts</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/charts/google-charts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Google Charts</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Book-open.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000" />
													<path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Maps</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Maps</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/maps/google-maps.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Google Maps</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/maps/leaflet.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Leaflet</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/maps/jqvmap.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">JQVMap</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Miscellaneous</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Miscellaneous</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/kanban-board.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Kanban Board</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/sticky-panels.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Sticky Panels</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/blockui.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Block UI</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/perfect-scrollbar.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Perfect Scrollbar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/treeview.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tree View</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/bootstrap-notify.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Bootstrap Notify</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/toastr.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Toastr</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/sweetalert2.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">SweetAlert2</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/dual-listbox.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dual Listbox</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/session-timeout.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Session Timeout</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/idle-timer.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Idle Timer</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/cropper.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Cropper</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
							<!--end::Menu Nav-->
						</div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside-->
