<?php

/**
 * @SWG\Tag(
 *      name="Users",
 *      description="Usuários"
 * )
 */

/**
 * @SWG\Definition(
 *     type="object",
 *     title="User model",
 *     definition="User",
 *     @SWG\Property(
 *        property="id",
 *        type="integer"
 *     ),
 *     @SWG\Property(
 *        property="name",
 *        type="string"
 *     )
 *
 * )
 */

/**
 * @SWG\Get(
 *      path="/users",
 *      operationId="getUserList",
 *      tags={"Users"},
 *      summary="Get list of users",
 *      description="Returns list of users",
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @SWG\Response(response=400, description="Bad request"),
 *       security={
 *           {"default": {}}
 *       }
 *     )
 *
 * Returns list of projects
 */
/**
 * @SWG\Post(
 *      path="/users",
 *      operationId="storeUser",
 *      tags={"Users"},
 *      summary="Store a new user",
 *      description="Store a new user",
 *      @SWG\Parameter(
 *          name="name",
 *          description="User name",
 *          required=true,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="email",
 *          description="User email",
 *          required=true,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="registry",
 *          description="User registry",
 *          required=true,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="photo",
 *          description="User profile photo",
 *          required=true,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="shift_id",
 *          description="User shift",
 *          required=true,
 *          type="integer",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="role_id",
 *          description="User role",
 *          required=true,
 *          type="integer",
 *          in="formData"
 *      ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Response(response=400, description="Bad request"),
 *      @SWG\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "default": {}
 *         }
 *     },
 * )
 *
 */
/**
 * @SWG\Get(
 *      path="/users/{id}",
 *      operationId="showUser",
 *      tags={"Users"},
 *      summary="show data from on user",
 *      description="show data from on user",
 *      @SWG\Parameter(
 *          name="id",
 *          description="User id",
 *          required=true,
 *          type="integer",
 *          in="path"
 *      ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *      ),
 *      @SWG\Response(response=400, description="Bad request"),
 *       security={
 *           {"default": {}}
 *       }
 *     )
 *
 */
/**
 * @SWG\Put(
 *      path="/users/{id}",
 *      operationId="updateUser",
 *      tags={"Users"},
 *      summary="Update a user",
 *      description="Update a user",
 *      @SWG\Parameter(
 *          name="id",
 *          description="User id",
 *          required=true,
 *          type="integer",
 *          in="path"
 *      ),
 *      @SWG\Parameter(
 *          name="name",
 *          description="User name",
 *          required=false,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="email",
 *          description="User email",
 *          required=false,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="registry",
 *          description="User registry",
 *          required=false,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="photo",
 *          description="User profile photo",
 *          required=false,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="shift_id",
 *          description="User shift",
 *          required=false,
 *          type="integer",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="role_id",
 *          description="User role",
 *          required=false,
 *          type="integer",
 *          in="formData"
 *      ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Response(response=400, description="Bad request"),
 *      @SWG\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "default": {}
 *         }
 *     },
 * )
 *
 */

/**
 * @SWG\Delete(
 *      path="/users/{id}",
 *      operationId="deleteUser",
 *      tags={"Users"},
 *      summary="Deletes a user",
 *      description="Deletes a user",
 *      @SWG\Parameter(
 *          name="id",
 *          description="User id",
 *          required=true,
 *          type="integer",
 *          in="path"
 *      ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Response(response=400, description="Bad request"),
 *      @SWG\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "default": {}
 *         }
 *     },
 * )
 *
 */